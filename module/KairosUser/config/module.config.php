<?php
namespace KairosUser;
return array(
    'router' => array(
        'routes' => array(
            'kairos-user' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/users',
                    'defaults' => array(
                        'controller' => 'KairosUser\Controller\Index'
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
            'KairosUser\Controller\Index' => 'KairosUser\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'kairos_user_entities' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/KairosUser/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'KairosUser\Entity' => 'kairos_user_entities'
                )
            )
        )
    )
);
