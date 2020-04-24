<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.04 - Manipulação de objetos");

/*
 * [ manipulação ] http://php.net/manual/pt_BR/language.types.object.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$arrProfile = [
    "name" => "Robson",
    "company" => "UpInside",
    "mail" => "cursos@upinside.com.br"
];

// Criando um objeto a partir de uma array
$objProfile = (object)$arrProfile;
// var_dump($arrProfile, $objProfile);

// Acessando através da array
echo "<p>{$arrProfile['name']} trabalha na {$arrProfile['company']}</p>";
// Acessando através do objeto 
echo "<p>{$objProfile->name} trabalha na {$objProfile->company}</p>";

$ceo = $objProfile;
unset($ceo->company);
var_dump($ceo);

// Instanciando um objeto StdClass
$company = new stdClass();
$company->company = "UpInside";
$company->ceo = $ceo;
$company->manager = new stdClass();
$company->manager->name = "Kaue";
$company->manager->mail = "cursos@upinside.com.br";

var_dump($company);


/**
 * [ análise ] class | objetcs | instances
 */
fullStackPHPClassSession("análise", __LINE__);

