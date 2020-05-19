<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.02 - Classes, propriedades e objetos");

/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */
fullStackPHPClassSession("classe e objeto", __LINE__);

require __DIR__ . "/classes/User.php"; // Trazendo nossa classe User

$user = new User(); // Instanciando a classe User e criando um objeto apartir dela 

var_dump($user);

/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.properties.php
 */
fullStackPHPClassSession("propriedades", __LINE__);

$user->firstName = "Ricardo";
$user->lastName = "Barbosa";
$user->email = "ricardo.baldrez@gmail.com";

var_dump($user);

echo "<p>O e-mail do {$user->firstName} é {$user->email}</p>";

/*
 * [ métodos ] São as funções que definem o comportamento e a regra de negócios de uma classe
 */
fullStackPHPClassSession("métodos", __LINE__);

$user->setFirstName("Ricardo");
$user->setLastName("Baldrez");

if(!$user->setEmail("ricardo@gmail")) {
    echo "<p class='trigger error'>O email não é válido!</p>";
}

var_dump($user);