<?php

namespace Source\Traits;

class Address
{
    protected $street;
    protected $number;
    protected $complement;

    public function __construct($street, $number, $complement)
    {
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
    }

    /**
     * Get the value of complement
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Get the value of number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get the value of street
     */
    public function getStreet()
    {
        return $this->street;
    }
}
