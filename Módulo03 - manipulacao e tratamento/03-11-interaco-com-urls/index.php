<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.11 - Interação com URLs");

/*
 * [ argumentos ] ?[&[&][&]]
 */
fullStackPHPClassSession("argumentos", __LINE__);

echo "<h1><a href='index.php'>Clear ... </a></h1>";
echo "<p><a href='index.php?arg=1&arg=2'>Args</a></p>"; // Exemplo de um link criando args

$data = [
    "name" => "Ricardo",
    "company" => "Google",
    "mail" => "ricardo.baldrez@gmail.com"
];

$arguments = http_build_query($data); // http_build_query = transformando array em argumentos válidos para url (Gera a string de consulta (query) em formato URL)
echo "<p><a href='index.php?{$arguments}'>Args by Array</a></p>";

var_dump([
    "GET" => $_GET,
    "data" => $data,
    "arguments" => $arguments,
]);

$object = (object)$data; // Transformando a array em um objeto
var_dump(
    $object,
    http_build_query($object) // Transformando o objeto em argumentos de url
);

/*
 * [ segurança ] get | strip | filters | validation
 * [ filter list ] https://php.net/manual/en/filter.filters.php
 */
fullStackPHPClassSession("segurança", __LINE__);