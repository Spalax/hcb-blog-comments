<?php
return array(
    //Controllers
    'HcbComments-Controller-List' => 'HcBackend\Controller\Common\Collection\ListController',
    'HcbComments-Controller-Show' => 'HcBackend\Controller\Common\Collection\ResourceController',
    'HcbComments-Controller-Moderate' => 'HcBackend\Controller\Common\Collection\DataController',
    'HcbComments-Controller-Delete' => 'HcBackend\Controller\Common\Collection\DataController',

    //Common
    'HcbComments-PaginatorViewModel' => 'Zf2Libs\Paginator\ViewModel\JsonModel',
    'HcbComments-Collection-Ids' => 'HcBackend\Service\Collection\IdsService',
    'HcbComments-Collection' => 'HcBackend\Data\Collection\Entities\ByIds',
    'HcbComments-FetchService' => 'HcBackend\Service\FetchService'
);
