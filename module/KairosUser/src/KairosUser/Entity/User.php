<?php
namespace KairosUser\Entity;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Class User
 * @package KairosUser\Entity
 * @ORM\Entity(repositoryClass="KairosUser\Entity\UserRepository")
 * @ORM\Table(name="users")
 */
class User  implements UserInterface
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;


    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $first_name;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $last_name;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $address;

    /**
     * @var string
     * @ORM\Column
     */
    private $email;

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

    /**
     * @var string
     */
    private $timezone;

    /**
     * @var bool
     */
    private $localized = false;

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



    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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

    public function hydrator($content)
    {
        $hydrator = new ClassMethods();
        return $hydrator->hydrate($content, $this);
    }

    public function toArray($object)
    {
        $hydrator = new ClassMethods();
        return $hydrator->extract($object);
    }

} 