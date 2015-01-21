<?php

namespace KairosTicket\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

class AbstractEntity {

    /**
     *@ORM\Column(type="string")
     */
    private $timezone;

    /**
     * @var bool
     */
    private $localized = false;

    /**
     * @var \Datetime
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var \Datetime
     * @ORM\Column(type="datetime")
     */
    private $modified;

    public function __construct(\DateTime $createDate)
    {
        $this->localized = true;
        $this->created = $createDate;
        $this->timezone = $createDate->getTimeZone()->getName();
    }

    public function getCreated()
    {
        if (!$this->localized) {
            $this->created->setTimeZone(new \DateTimeZone($this->timezone));
        }
        return $this->created;
    }

    /**
     * @return \Datetime
     */
    public function getModified()
    {
        return $this->modified;
    }


    public function setModified()
    {
        $this->modified = new \DateTime("now");
    }

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