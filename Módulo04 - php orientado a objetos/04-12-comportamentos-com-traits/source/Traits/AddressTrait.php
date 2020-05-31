<?php

namespace Source\Traits;

trait AddressTrait
{
    private $address;

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }
}
