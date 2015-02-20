<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'ajax' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/ajax'
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'getItems' => array(
                       'type' => 'literal',
                        'options' => array(
                            'route' => '/get-items',
                            'defaults' => array(
                                'controller' => 'Ajax\Controller\GetItems'
                            ),
                        ) 
                    ),
                )
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(),
        'aliases' => array(),
        
    ),
    'translator' => array(),
    'controllers' => array(
        'invokables' => array(
            'Ajax\Controller\GetItems' => 'Ajax\Controller\GetItemsController'
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
           'ViewJsonStrategy',
        ),
    )
);
