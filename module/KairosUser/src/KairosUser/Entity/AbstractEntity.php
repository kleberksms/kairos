<?php

namespace KairosUser\Entity;

use KairosCore\Entity\AbstractEntity as KairosCoreAbstractEntity;


class AbstractEntity extends KairosCoreAbstractEntity
{
    public function __construct(\DateTime $createDate)
    {
        parent::__construct($createDate);

    }

} 