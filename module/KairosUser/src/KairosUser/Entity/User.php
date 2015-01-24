<?php
namespace KairosUser\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class User
 * @package KairosUser\Entity
 * @ORM\Entity(repositoryClass="KairosUser\Entity\UserRepository")
 * @ORM\Table(name="users")
 */
class User extends AbstractEntity implements UserInterface
{



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



} 