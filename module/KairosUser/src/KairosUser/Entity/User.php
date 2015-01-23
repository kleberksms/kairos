<?php
namespace KairosUser\Entity;

/**
 * Class User
 * @package KairosUser\Entity
 * @ORM\Entity(repositoryClass="KairosUser\Entity\UserRepository")
 * @ORM\Table(name="users")
 */
class User extends AbstractEntity implements UserInterface
{

} 