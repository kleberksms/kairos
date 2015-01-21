<?php

namespace KairosFile\Service;
use KairosCore\Service\AbstractService as AbstractServiceCore;
use Doctrine\ORM\EntityManager;

class AbstractService extends AbstractServiceCore
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
    }
} 