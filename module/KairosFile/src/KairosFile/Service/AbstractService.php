<?php

namespace KairosFile\Service;
use KairosCore\Service\AbstractService as KairosCoreAbstractService;
use Doctrine\ORM\EntityManager;

class AbstractService extends KairosCoreAbstractService
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
    }
} 