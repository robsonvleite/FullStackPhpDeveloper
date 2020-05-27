<?php

use Source\Bank\AccountCurrent;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.10 - Fundamentos da abstração");

require __DIR__ . "/source/autoload.php";

/*
 * [ superclass ] É uma classe criada como modelo e regra para ser herdada por outras classes,
 * mas nunca para ser instanciada por um objeto.
 */
fullStackPHPClassSession("superclass", __LINE__);

$client = new \Source\App\User("Ricardo", "barbosa");
// $account = new \Source\Bank\Account("0272", "4204-0", $client, 2000);

var_dump(
    $client
    // $account
);

/*
 * [ especialização ] É uma classe filha que implementa a superclasse e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.a", __LINE__);

$saving = new \Source\Bank\AccountSaving(
    "0272",
    "4204-0",
    $client,
    0
);


var_dump(
    $saving
);

$saving->deposit(1000);
$saving->deposit(2000);
$saving->withdrawal(2000);
$saving->extract();

var_dump($saving);

/*
 * [ especialização ] É uma classe filha que implementa a superclass e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.b", __LINE__);

$current = new AccountCurrent(
    "0272",
    "4204-0",
    $client,
    "1000",
    "1000"
);

var_dump($current);

$current->deposit("1000");
$current->withdrawal("1000");
$current->withdrawal("500");
$current->withdrawal("500");

$current->extract();

var_dump($current);
