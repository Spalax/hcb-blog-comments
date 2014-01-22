<?php
namespace HcbComments\Service;

use HcbComments\Entity\Comment as CommentEntity;
use HcBackend\Data\Collection\Entities\ByIdsInterface;
use HcBackend\Service\CommandInterface;
use Doctrine\ORM\EntityManagerInterface;
use Zf2Libs\Stdlib\Service\Response\Messages\Response;

class ModerateService implements CommandInterface
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
    protected $moderateData;

    /**
     * @param EntityManagerInterface $entityManager
     * @param Response $response
     * @param ByIdsInterface $moderateData
     */
    public function __construct(EntityManagerInterface $entityManager,
                                Response $response,
                                ByIdsInterface $moderateData)
    {
        $this->entityManager = $entityManager;
        $this->response = $response;
        $this->moderateData = $moderateData;
    }

    /**
     * @return Response
     */
    public function execute()
    {
        return $this->moderate($this->moderateData);
    }

    /**
     * @param ByIdsInterface $commentsToModerate
     * @return Response
     */
    protected  function moderate(ByIdsInterface $commentsToModerate)
    {
        try {
            $this->entityManager->beginTransaction();
            $commentsEntities = $commentsToModerate->getEntities();

            /* @var $commentsEntities CommentEntity[] */
            foreach ($commentsEntities as $commentEntity) {
                if ($commentEntity->getApproved()) {
                    $commentEntity->setApproved(0);
                } else {
                    $commentEntity->setApproved(1);
                }

                $this->entityManager->persist($commentEntity);
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
