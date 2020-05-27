<?php

namespace Source\Bank;

use Source\App\Trigger;
use Source\App\User;

// Classe Abstrata = Utilizada como modelo de implementação(ou seja, usada para implementar outras classes)
abstract class Account
{
    protected $branch;
    protected $account;
    protected $client;
    protected $balance;

    protected function __construct($branch, $account, User $client, $balance)
    {
        $this->branch = $branch;
        $this->account = $account;
        $this->client = $client;
        $this->balance = $balance;
    }

    public function extract()
    {
        $extract = ($this->balance >= 1 ? Trigger::ACCEPT : Trigger::ERROR);
        Trigger::show("EXTRATO: <br> Saldo atual: {$this->toBrl($this->balance)}", $extract);
    }

    protected function toBrl($value)
    {
        return "R$ " . number_format($value, "2", ",", ".");
    }

    // Função abstrata diz que a classe filha precisa implementá-la(Então aqui a classe é abstrata, mas na classe filha terá que ser concreta)
    abstract public function deposit($value);
    abstract public function withdrawal($value);
}
