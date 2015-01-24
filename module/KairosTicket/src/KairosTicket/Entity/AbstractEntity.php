<?php

namespace KairosTicket\Entity;

use KairosCore\Entity\AbstractEntity as KairosCoreAbstractEntity;
use Doctrine\ORM\Mapping as ORM;

class AbstractEntity extends KairosCoreAbstractEntity
{
    public function __construct(\DateTime $createDate)
    {
        parent::__construct($createDate);

    }

} 