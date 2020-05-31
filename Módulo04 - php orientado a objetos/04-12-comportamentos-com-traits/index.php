<?php

use Source\Traits\Address;
use Source\Traits\Cart;
use Source\Traits\Register;
use Source\Traits\User;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.12 - Comportamentos com traits");

require __DIR__ . "/source/autoload.php";

/*
 * [ trait ] São traços de código que podem ser reutilizados por mais de uma classe. Um trait é como um comportamento
 * do objeto (BEHAVES LIKE). http://php.net/manual/pt_BR/language.oop5.traits.php
 */
fullStackPHPClassSession("trait", __LINE__);

$user = new User("Ricardo", "Baldrez", "ricardo.baldrez@gmail.com");
$address = new Address("Rua Forte do Calvário", "312", "");

$regiter = new Register($user, $address);

var_dump(
    $user,
    $address,
    $regiter,
    $regiter->getUser(),
    $regiter->getAddress(),
    $regiter->getUser()->getFirstName(),
    $regiter->getAddress()->getStreet()
);

echo "<br>";
echo "Carrinho de compras: ";

$cart = new Cart();
$cart->add("1", "Full Stack PHP Developer", "2", "2000");
$cart->add("2", "HTML5 & CSS3 ESSENTIALS", "3", "500");

$cart->remove("2", "1");

$cart->checkout($user, $address);

var_dump($cart);
