<?php

namespace KairosTicket\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

class AbstractEntity {

    public function hydrator($content, $entity)
    {
        $hydrator = new ClassMethods();
        return $hydrator->hydrate($content, $entity);
    }

    public function toArray()
    {
        $hydrator = new ClassMethods();
        return $hydrator->extract($this);
    }
} 