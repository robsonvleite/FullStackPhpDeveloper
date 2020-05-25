<?php

namespace Source\Inheritance\Event;

class EventOnline extends Event
{
    private $link;

    public function __construct($event, \DateTime $date, $price, $link, $vacancies = null)
    {
        parent::__construct($event, $date, $price, $vacancies);
        $this->link = $link;
    }

    public function register($fullName, $email) // Poliformando a instrução da função register herdada da nossa classe Event, mantendo o mesmo nome de método, a mesma assinatura(parâmetros), mas modificando seu comportamento
    {
        $this->vacancies += 1;
        $this->setRegister($fullName, $email);
        echo "<p class='trigger accept'>Show {$fullName}, seu registro foi um sucesso!!!</p>";
    }
}
