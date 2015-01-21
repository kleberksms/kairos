<?php

namespace KairosUser\Service;


use Doctrine\ORM\EntityManager;

class User extends AbstractService
{

    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
        $this->entity = 'KairosUser\Entity\User';
    }

} 