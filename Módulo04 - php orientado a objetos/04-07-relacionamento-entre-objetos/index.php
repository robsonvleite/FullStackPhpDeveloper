<?php

use Source\Related\Address;
use Source\Related\Product;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.07 - Relacionamento entre objetos");

require __DIR__ . "/source/autoload.php";

/*
 * [ associacão ] É a associação mais comum entre objetos onde o objeto terá um atributo
 * apontando e dando acesso ao outro objeto
 */
fullStackPHPClassSession("associacão", __LINE__);

$company = new \Source\Related\Company();
$company->bootCompany(
    "UpInside",
    "Nome da rua"
);

var_dump($company);

$address = new \Source\Related\Address("Rua Forte do Calvário", "312", "casa 01");
$company->boot(
    "UpInside",
    $address
);

var_dump($company);

echo "<p>A {$company->getCompany()} tem sede na rua {$company->getAddress()->getStreet()}, nº {$company->getAddress()->getNumber()}.</p>";

/*
 * [ agregação ] Em agregação tornamos um objeto externo parte do objeto base, contudo não
 * o referenciamos em uma propriedade como na associação.
 */
fullStackPHPClassSession("agregação", __LINE__);

$fsphp = new \Source\Related\Product("Full Stack PHP", 1997);
$laraDev = new \Source\Related\Product("Laravel Dev", 997);

var_dump($fsphp, $laraDev);

$company->addProduct($fsphp);
$company->addProduct($laraDev);

var_dump($company);

/**
 * @var \Source\Related\Product $product
 */
echo "<h1>Produtos:</h1>";
foreach ($company->getProducts() as $product) {
    echo "<p>Nome: {$product->getName()}<br>Preço: R$ {$product->getPrice()}</p>";
}

/*
 * [ composição ] Em composição temos um objeto base que é responsável por instanciar o
 * objeto parte, que só existe enquanto o base existir.
 */
fullStackPHPClassSession("composição", __LINE__);

$company->addTeamMember("CEO", "Robson", "Leite");
$company->addTeamMember("DEV", "Ricardo", "Barbosa");
$company->addTeamMember("ADM", "Nathália", "Oliveira");
$company->addTeamMember("SUP", "Gustavo", "Web");

var_dump($company);

echo "<h1>Membros do nosso time:</h1>";

foreach ($company->getTeam() as $teamMember) {
    echo "<p class='trigger'>{$teamMember->getJob()}: {$teamMember->getFirstName()} {$teamMember->getLastName()}</p>";
}
