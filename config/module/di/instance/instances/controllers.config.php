<?php
return array(
    'HcbComments-Controller-List' => array(
        'parameters' => array(
            'paginatorDataFetchService' => 'HcbComments\Service\FetchQbBuilderService',
            'viewModel' => 'HcbComments-PaginatorViewModel'
        )
    ),

    'HcbComments-Controller-Show' => array(
        'parameters' => array(
            'fetchService' => 'HcbComments-FetchService',
            'extractor' => 'HcbComments\Stdlib\Extractor\Extractor'
        )
    ),

    'HcbComments-Controller-Moderate' => array(
        'parameters' => array(
            'inputData' => 'HcbComments-Collection',
            'serviceCommand' => 'HcbComments\Service\ModerateService',
            'jsonResponseModelFactory' => 'Zf2Libs\View\Model\Json\Specific\StatusMessageDataModelFactory'
        )
    ),

    'HcbComments-Controller-Delete' => array(
        'parameters' => array(
            'inputData' => 'HcbComments-Collection',
            'serviceCommand' => 'HcbComments\Service\DeleteService',
            'jsonResponseModelFactory' => 'Zf2Libs\View\Model\Json\Specific\StatusMessageDataModelFactory'
        )
    )
);
