<?php

namespace Source\Related;

class User
{
    private $job;
    private $firstName;
    private $lastName;

    public function __construct($job, $firsName, $lastName)
    {
        $this->job = $job;
        $this->firstName = $firsName;
        $this->lastName = $lastName;
    }

    /**
     * Get the value of job
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Get the value of firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Get the value of lastname
     */
    public function getLastName()
    {
        return $this->lastName;
    }
}
