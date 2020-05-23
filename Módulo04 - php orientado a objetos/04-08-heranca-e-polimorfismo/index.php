<?php

use Source\Inheritance\Event\Event;

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


/*
 * [ polimorfismo ] Uma classe filha que tem métodos iguais (mesmo nome e argumentos) a class
 * pai, mas altera o comportamento desses métodos para se especializar
 */
fullStackPHPClassSession("polimorfismo", __LINE__);
