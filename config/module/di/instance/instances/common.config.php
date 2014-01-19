<?php
return array(
    'HcbComments-PaginatorViewModel' => array(
        'parameters' => array(
            'extractor' => 'HcbComments\Stdlib\Extractor\Extractor'
        )
    ),

    'HcbComments-Collection-Ids' => array(
        'parameters' => array(
            'entityName' => 'HcbComments\Entity\Comment'
        )
    ),

    'HcbComments-Collection' => array(
        'parameters' => array(
            'idsCollection' => 'HcbComments-Collection-Ids',
            'inputName' => 'comments'
        )
    ),

    'HcbComments\Service\DeleteService' => array(
        'parameters' => array(
            'deleteData' => 'HcbComments-Collection'
        )
    ),

    'HcbComments\Service\ModerateService' => array(
        'parameters' => array(
            'moderateData' => 'HcbComments-Collection'
        )
    ),

    'HcbComments-FetchService' => array(
        'parameters' => array(
            'entityName' => 'HcbComments\Entity\Comment'
        )
    ),
);
