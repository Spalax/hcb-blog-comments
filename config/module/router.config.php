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
                        'show' => array(
                            'type' => 'segment',
                            'options' => array(
                                'route' => '/:id',
                                'constraints' => array( 'id' => '[0-9]+' )
                            ),
                            'may_terminate' => false,
                            'child_routes' => array(
                                'show' => array(
                                    'type' => 'method',
                                    'options' => array(
                                        'verb' => 'get',
                                        'defaults' => array(
                                            'controller' => 'HcbComments-Controller-Show'
                                        )
                                    )
                                )
                            )
                        ),
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
                        ),
                        'delete' => array(
                            'type' => 'literal',
                            'options' => array(
                                'route' => '/delete'
                            ),
                            'may_terminate' => false,
                            'child_routes' => array(
                                'delete' => array(
                                    'type' => 'method',
                                    'options' => array(
                                        'verb' => 'post',
                                        'defaults' => array(
                                            'controller' => 'HcbComments-Controller-Delete'
                                        )
                                    )
                                )
                            )
                        ),
                        'moderate' => array(
                            'type' => 'literal',
                            'options' => array(
                                'route' => '/moderate'
                            ),
                            'may_terminate' => false,
                            'child_routes' => array(
                                'delete' => array(
                                    'type' => 'method',
                                    'options' => array(
                                        'verb' => 'post',
                                        'defaults' => array(
                                            'controller' => 'HcbComments-Controller-Moderate'
                                        )
                                    )
                                )
                            )
                        ),
                    )
                )
            )
        )
    )
);
