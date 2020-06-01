<?php

namespace Source\Qualifield;

class User
{
    // O encapsulamento é o ato de você provê uma proteção de acesso aos membros internos de um objeto.
    private $firstName;
    private $lastName;
    private $email;
    private $error;

    public function setUser($firstName, $lastName, $email)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);

        if (!$this->setEmail($email)) {
            $this->error = "O e-mail {$this->getEmail()} não é válido!!!";

            return false;
        }

        return true;
    }

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
    private function setFirstName($param)
    {
        $this->firstName = $param;

        return $this;
    }

    /**
     * Get the value of lasttName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lasttName
     *
     * @return  self
     */
    private function setLastName($param)
    {
        $this->lastName = $param;

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
    private function setEmail($param)
    {
        $this->email = $param;

        if (filter_var($param, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the value of error
     */
    public function getError()
    {
        return $this->error;
    }
}
