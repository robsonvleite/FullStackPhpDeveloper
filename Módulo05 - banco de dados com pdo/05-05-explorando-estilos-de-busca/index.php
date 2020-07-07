<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.05 - Explorando estilos de busca");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;
use Source\Database\Entity\UserEntity;

/*
 * [ fetch ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch", __LINE__);

$connect = Connect::getInstance();
$read = $connect->query("SELECT * FROM users LIMIT 3");

if(!$read->rowCount()) {
    echo "<p class='trigger'>Não obteve resultados!</p>";
} else {
    // var_dump($read->fetch());
    // fetch -> Traz um resultado apenas e o nextRowSet para poder percorrer todos eles com while por ex.

    while($user = $read->fetch()) {
        var_dump($user);
    }
}

/*
 * [ fetch all ] http://php.net/manual/pt_BR/pdostatement.fetchall.php
 */
fullStackPHPClassSession("fetch all", __LINE__);

// fetch -> abrir com while, fetchAll -> abrir com foreach por ser uma array

$read = $connect->query("SELECT * FROM users LIMIT 3,2");

// while ($user = $read->fetchAll()) {
//     var_dump($user);
// }

foreach ($read->fetchAll() as $user) {
    var_dump($user);
}

/*
 * [ fetch save ] Realziar um fetch diretamente em um PDOStatement resulta em um clear no buffer da consulta. Você
 * pode armazenar esse resultado em uma variável para manipilar e exibir posteriormente.
 */
fullStackPHPClassSession("fetch save", __LINE__);

// LIMIT 5,1 -> pule os 5 primeiros retornos e pegue o (OFFSET)1º após os pulos
$read = $connect->query("SELECT * FROM users LIMIT 5,1");
$result = $read->fetchAll();

var_dump(
    $read->fetchAll(),
    $result,
    $result
);

/*
 * [ fetch modes ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch styles", __LINE__);

$read = $connect->query("SELECT * FROM users LIMIT 1");
foreach ($read->fetchAll() as $user) {
    var_dump($user, $user->first_name);
}

$read = $connect->query("SELECT * FROM users LIMIT 1");
// $read->fetchAll(PDO::FETCH_NUM) -> Traz um array com os indices numéricos
foreach ($read->fetchAll(PDO::FETCH_NUM) as $user) {
    var_dump($user, $user[1]);
}

$read = $connect->query("SELECT * FROM users LIMIT 1");
// $read->fetchAll(PDO::FETCH_ASSOC) -> Traz um array com os indices associativos ao nome real
foreach ($read->fetchAll(PDO::FETCH_ASSOC) as $user) {
    var_dump($user, $user['first_name']);
}

$read = $connect->query("SELECT * FROM users LIMIT 1");
// $read->fetchAll(PDO::FETCH_CLASS, \Source\DataBase\Entity\UserEntity::class) -> O objeto não sendo de uma classe anônima, ele sendo um objeto de uma classe que representa a tabela na aplicação 
foreach ($read->fetchAll(PDO::FETCH_CLASS, \Source\DataBase\Entity\UserEntity::class) as $user) {
    /**
     * @var \Source\Database\Entity\UserEntity $user
     */
    var_dump($user, $user->getFirst_name());
}