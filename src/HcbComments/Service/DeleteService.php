<?php
namespace HcbComments\Service;

use HcbComments\Entity\Comment as CommentEntity;
use HcBackend\Data\Collection\Entities\ByIdsInterface;
use HcBackend\Service\CommandInterface;
use Doctrine\ORM\EntityManagerInterface;
use Zf2Libs\Stdlib\Service\Response\Messages\Response;

class DeleteService implements CommandInterface
{
    /**
     * @var EntityManagerInterface
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

    /**
     * @param EntityManagerInterface $entityManager
     * @param Response $response
     * @param ByIdsInterface $deleteData
     */
    public function __construct(EntityManagerInterface $entityManager,
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
     * @param ByIdsInterface $commentsToDelete
     * @return Response
     */
    protected  function delete(ByIdsInterface $commentsToDelete)
    {
        try {
            $this->entityManager->beginTransaction();
            $commentEntities = $commentsToDelete->getEntities();

            /* @var $commentEntities CommentEntity[] */
            foreach ($commentEntities as $commentEntity) {
                $this->entityManager->remove($commentEntity);
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
