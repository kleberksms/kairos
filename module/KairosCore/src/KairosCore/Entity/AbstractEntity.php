<?php

namespace KairosCore\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

class AbstractEntity
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

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
    protected $created;

    /**
     * @var \Datetime
     * @ORM\Column(type="datetime")
     */
    protected $modified;

    public function __construct(\DateTime $createDate)
    {
        $this->localized = true;
        $this->created = $createDate;
        $this->timezone = $createDate->getTimeZone()->getName();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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