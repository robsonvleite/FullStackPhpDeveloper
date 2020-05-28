<?php

namespace Source\Contracts;

/*
Apesar se parece muito com classes, dentro do escopo de uma interface não temos propriedades e nem implementações concretas
São apenas assinaturas do que uma classe deve implementar para ser construída ou o que um objeto deve implementar para ter comunicação com outra classe
*/

interface UserInterface
{
    // public function __construct($firstName, $lastName, $email);
    // public function setEmail($email);

    public function getEmail();
    public function getFirstName();
    public function getLastName();
}
