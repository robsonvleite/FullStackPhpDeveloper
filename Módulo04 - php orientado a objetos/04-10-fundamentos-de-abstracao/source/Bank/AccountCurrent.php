<?php

namespace Source\Bank;

use Source\App\User;
use Source\App\Trigger;

class AccountCurrent extends Account
{
    public $limit;

    public function __construct($branch, $account, User $client, $balance, $limit)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->limit = $limit;
    }

    // Final = Diz que mesmo sendo herdado os métodos não poderão ser modificados, seja por poliformmismo e etc ...
    final public function deposit($value)
    {
        $this->balance += $value;
        Trigger::show("Déposito de {$this->toBrl($value)} foi realizado com sucesso!", Trigger::ACCEPT);
    }

    final public function withdrawal($value)
    {
        if ($value <= $this->balance + $this->limit) {
            $this->balance -= abs($value);

            if ($this->balance < 0) {
                $tax = abs($this->balance) * 0.006;
                $this->balance -= $tax;
                $this->limit -= $value + $tax;

                if ($this->limit < 0) {
                    Trigger::show("ERROR! Seu limite estourou", Trigger::ERROR);

                    return;
                }
                Trigger::show("Taxa de uso de limite: {$this->toBrl($tax)}", Trigger::WARNING);
            }

            Trigger::show("Saque de {$this->toBrl($value)} efetuado com sucesso", Trigger::ERROR);
        } else {
            $saving = $this->balance + $this->limit;
            Trigger::show("Saldo insuficiente, você tem {$this->toBrl($saving)}", Trigger::ERROR);
        }
    }
}
