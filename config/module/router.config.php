<?php
return array(
    'routes' => array(
        'hc-backend' => array(
            'child_routes' => array(
                'comments' => array(
                    'type' => 'literal',
                    'options' => array(
                        'route' => '/comments'
                    ),
                    'may_terminate' => false,
                    'child_routes' => array(
                        'list' => array(
                            'type' => 'method',
                            'options' => array(
                                'verb' => 'get'
                            ),
                            'may_terminate' => false,
                            'child_routes' => array(
                                'show' => array(
                                    'type' => 'XRequestedWith',
                                    'options' => array(
                                        'with' => 'XMLHttpRequest',
                                        'defaults' => array(
                                            'controller' => 'HcbComments-Controller-List'
                                        )
                                    )
                                )
                            )
                        )
                    )
                )
            )
        )
    )
);
