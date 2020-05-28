<?php

use Source\Contracts\User;
use Source\Contracts\Login;
use Source\Contracts\UserAdmin;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.11 - Contratos com interfaces");

require __DIR__ . "/source/autoload.php";

/*
 * [ implementacão ] Um contrato de quais métodos a classe deve implementar
 * http://php.net/manual/pt_BR/language.oop5.interfaces.php
 */
fullStackPHPClassSession("implementacão", __LINE__);

$user = new User(
    "Ricardo",
    "Barbosa",
    "ricardo.baldrez@gmail.com"
);

$userAdmin = new UserAdmin(
    "Ricardo",
    "Barbosa",
    "ricardo.baldrez@gmail.com"
);

var_dump($user, $userAdmin);

/*
 * [ associação ] Um exemplo associando ao login
 */
fullStackPHPClassSession("associação", __LINE__);

$login = new Login();

$loginUser = $login->loginUser($user);
$loginAdmin = $login->loginAdmin($userAdmin);

var_dump($loginUser, $loginAdmin);

/*
 * [ dependência ] Dependency Injection ou DI, é um contrato de relação entre objetos, onde
 * um método assina seus atributos com uma interface.
 */
fullStackPHPClassSession("dependência", __LINE__);

var_dump(
    $login->login($user),
    $login->login($user)->getFirstName(),
    $login->login($userAdmin),
    $login->login($userAdmin)->getLastName()
);
