<?php

namespace Source\Models;

// abstract - Não pode ser implementada por um obj e somente herdada por outras classes
abstract class Model 
{
    /** @var object|null */
    protected $data;

    /** @var \PDOException|null */
    protected $fail;

    /** @var string|null */
    protected $message;

    /**
     * Get the value of data
     */ 
    public function data(): ?object
    {
        return $this->data;
    }

    /**
     * Get the value of fail
     */ 
    public function fail(): \PDOException
    {
        return $this->fail;
    }

    /**
     * Get the value of message
     */ 
    public function message(): ?string
    {
        return $this->message;
    }

    protected function create()
    {

    }

    protected function read()
    {

    }

    protected function update()
    {

    }

    protected function delete()
    {

    }

    protected function safe(): ?array
    {

    }

    protected function filter()
    {

    }
}