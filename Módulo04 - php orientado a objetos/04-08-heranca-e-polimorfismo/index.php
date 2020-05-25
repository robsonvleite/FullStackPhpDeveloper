<?php

use Source\Inheritance\Event\Event;

use function PHPSTORM_META\override;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.08 - Herança e polimorfismo");

require __DIR__ . "/source/autoload.php";

/*
 * [ classe pai ] Uma classe que define o modelo base da estrutura da herança
 * http://php.net/manual/pt_BR/language.oop5.inheritance.php
 */
fullStackPHPClassSession("classe pai", __LINE__);

$event = new \Source\Inheritance\Event\Event(
    "Workshop FSPHP",
    new DateTime("2021-05-20 16:00"),
    2500,
    4
);

var_dump($event);

$event->register("Ricardo Barbosa Baldrez", "ricardo.baldrez@gmail.com");
$event->register("Nathália", "nathalia.op@gmail.com");

echo "<h2>Registrados:</h2>";
foreach ($event->getRegister() as $registred) {
    echo "<p class='trigger'>Nome: {$registred['name']}<br> Email: {$registred['email']}</p>";
}

var_Dump($event);

/*
 * [ classe filha ] Uma classe que herda a classe pai e especializa suas rotinas
 */
fullStackPHPClassSession("classe filha", __LINE__);

$address = new \Source\Inheritance\Address("Rua Forte do Calvário", 312);
$event = new \Source\Inheritance\Event\EventLive(
    "Workshop FSPHP Live",
    new DateTime("2022-07-21 16:20"),
    500,
    10,
    $address
);


var_dump($event);

/*
 * [ polimorfismo ] Uma classe filha que tem métodos iguais (mesmo nome e argumentos) a class
 * pai, mas altera o comportamento desses métodos para se especializar
 */
fullStackPHPClassSession("polimorfismo", __LINE__);
$eventOnline = new \Source\Inheritance\Event\EventOnline(
    "Workshop FSPHP Online",
    new DateTime("2022-07-21 16:20"),
    500,
    "http://upinside.com.br/aovivo"
);

var_dump($eventOnline);

$eventOnline->register("Ricardo", "ricardo.baldrez@gmail.com");
$eventOnline->register("Nathália", "Nathália@gmail.com");
$eventOnline->register("Fernando", "Fernando@gmail.com");
$eventOnline->register("Maria", "Maria@gmail.com");
$eventOnline->register("Baldrez", "baldrez@gmail.com");

var_dump($eventOnline);
