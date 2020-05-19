<?php

namespace Source\Qualifield;

class User
{
    private $firstName;
    private $lasttName;
    private $email;

    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    private function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lasttName
     */ 
    public function getLasttName()
    {
        return $this->lasttName;
    }

    /**
     * Set the value of lasttName
     *
     * @return  self
     */ 
    private function setLasttName($lasttName)
    {
        $this->lasttName = $lasttName;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    private function setEmail($email)
    {
        $this->email = $email;

        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        } 
    }
}