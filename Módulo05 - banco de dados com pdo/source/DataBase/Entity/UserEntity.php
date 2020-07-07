<?php

namespace Source\Database\Entity;

class UserEntity
{
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $document;

    /**
     * Get the value of first_name
     */ 
    public function getFirst_name()
    {
        return $this->first_name;
    }
}