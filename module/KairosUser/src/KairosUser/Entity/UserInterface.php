<?php

namespace KairosUser\Entity;


interface UserInterface
{

    public function getId();

    public function getFirstName();

    public function getLastName();

    public function getEmail();

    public function getAddress();

}