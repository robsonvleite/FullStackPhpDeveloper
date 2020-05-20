<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.05 - Interpretação e operações pt1");

require __DIR__ . "/source/autoload.php";

/*
 * [ construct ] Executado automaticamente por meio do operador new
 * http://php.net/manual/pt_BR/language.oop5.decon.php
 */
fullStackPHPClassSession("__construct", __LINE__);

// __construct = Cria uma responsabilidade maior para criar o objeto, permitindo assim a criação somente depois de inserir pelo menos os dados básicos. O método é executado automaticamente logo após a classe ser instânciada

$user = new \Source\Interpretation\User(
    "Ricardo",
    "Barbosa",
    "ricardo.baldrez@gmail.com"
);

var_dump($user);

/*
 * [ clone ] Executado automaticamente quando um novo objeto é criado a partir do operador clone.
 * http://php.net/manual/pt_BR/language.oop5.cloning.php
 */
fullStackPHPClassSession("__clone", __LINE__);

$ricardo = $user;

$nathalia = clone $ricardo; // Quando chamarmos a palavra reservada 'clone', chamamos a função __clone da nossa classe
$nathalia->setFirstName("Nathália");
$nathalia->setLastName("Oliveira");

var_dump(
    $user,
    $nathalia
);

/*
 * [ destruct ] Executado automaticamente quando o objeto é finalizado
 * http://php.net/manual/pt_BR/language.oop5.decon.php
 */
fullStackPHPClassSession("__destruct", __LINE__);