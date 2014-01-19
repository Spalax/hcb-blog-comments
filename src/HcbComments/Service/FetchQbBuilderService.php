<?php
namespace HcbComments\Service;

use HcBackend\Service\Fetch\Paginator\QueryBuilder\DataServiceInterface;
use HcBackend\Service\Sorting\SortingServiceInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Zend\Stdlib\Parameters;

class FetchQbBuilderService implements DataServiceInterface
{
    /**
     * @var SortingServiceInterface
     */
    protected $sortingService;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager,
                                SortingServiceInterface $sortingService)
    {
        $this->entityManager = $entityManager;
        $this->sortingService = $sortingService;
    }

    /**
     * @param Parameters $params
     * @return QueryBuilder
     */
    public function fetch(Parameters $params = null)
    {
        $qb = $this->entityManager
                   ->getRepository('HcbComments\Entity\Comment')
                   ->createQueryBuilder('c');

        if (is_null($params)) return $qb;
        return $this->sortingService->apply($params, $qb, 'c');
    }
}