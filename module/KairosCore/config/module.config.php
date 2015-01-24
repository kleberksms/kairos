<?php

return array(
    'doctrine' => array(
        'driver' => array(
            'kairos_core_entities' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/KairosCore/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'KairosCore\Entity' => 'kairos_core_entities'
                )
            )
        )
    )
);
