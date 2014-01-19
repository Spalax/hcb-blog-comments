<?php
namespace HcbComments\Service;

use HcbComments\Entity\Comment as CommentEntity;
use HcBackend\Data\Collection\Entities\ByIdsInterface;
use HcBackend\Service\CommandInterface;
use Doctrine\ORM\EntityManager;
use Zf2Libs\Stdlib\Service\Response\Messages\Response;

class DeleteService implements CommandInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var \Zf2Libs\Stdlib\Service\Response\Messages\Response
     */
    protected $response;

    /**
     * @var ByIdsInterface
     */
    protected $deleteData;

    public function __construct(EntityManager $entityManager,
                                Response $response,
                                ByIdsInterface $deleteData)
    {
        $this->entityManager = $entityManager;
        $this->response = $response;
        $this->deleteData = $deleteData;
    }

    /**
     * @return Response
     */
    public function execute()
    {
        return $this->delete($this->deleteData);
    }

    /**
     * @param ByIdsInterface $clientsToBlock
     * @return Response
     */
    protected  function delete(ByIdsInterface $postsToDelete)
    {
        try {
            $this->entityManager->beginTransaction();
            $postEntities = $postsToDelete->getEntities();

            /* @var $postEntities CommentEntity[] */
            foreach ($postEntities as $postEntity) {
                $this->entityManager->remove($postEntity);
            }

            $this->entityManager->flush();
            $this->entityManager->commit();
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->response->error($e->getMessage())->failed();
            return $this->response;
        }

        $this->response->success();
        return $this->response;
    }
}
