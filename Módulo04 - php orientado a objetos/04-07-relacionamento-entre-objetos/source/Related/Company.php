<?php

namespace Source\Related;

class Company
{
    private $company;
    /**
     * @var Address
     */
    private $address;
    private $team;
    /**
     * @var Product
     */
    private $products;

    public function bootCompany($company, $address)
    {
        $this->company = $company;
        $this->address = $address;
    }

    public function boot($company, Address $address)
    {
        $this->company = $company;
        $this->address = $address;
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    /**
     * Get the value of company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set the value of company
     *
     * @return  self
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get the value of address
     * 
     * (: Address)-> Diz que o retorno será de fato um objeto address 
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
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set the value of team
     *
     * @return  self
     */
    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get the value of products
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set the value of products
     *
     * @return array
     */
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }
}
