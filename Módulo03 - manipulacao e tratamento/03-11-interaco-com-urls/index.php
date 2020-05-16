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

$dataFilter = http_build_query([
    "name" => "Ricardo",
    "company" => "Google",
    "mail" => "ricardo.baldrez@gmail.com",
    "site" => "https://google.com.br",
    "script" => "<script>alert('js alert)</script>"
]);

echo "<p><a href='index.php?{$dataFilter}'>Data Filter</a></p>";

$dataUrl = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRIPPED); 

if($dataUrl) {
    if(in_array("", $dataUrl)) {
        echo "<p class='trigger warning'>Faltam dados!</p>";
    } elseif(empty($dataUrl['mail'])) {
        echo "<p class='trigger warning'>Preencha o e-mail</p>";
    } elseif (!filter_var($dataUrl['mail'], FILTER_VALIDATE_EMAIL)) {
        echo "<p class='trigger warning'>E-mail inválido</p>";
    } else {
        echo "<p class='trigger accept'>Tudo certo!</p>";
    }
}

var_dump([
    "dataFilter" => $dataFilter,
    "dataUrl" => $dataUrl
]);

parse_str($dataFilter, $arrDataFilter); // parse_str = Transformando os argumentos novamente em uma array
var_dump([
    "arrDataFilter" => $arrDataFilter
]);

$dataPreFilter = [
    "name" => FILTER_SANITIZE_STRING,
    "company" => FILTER_SANITIZE_STRING,
    "mail" => FILTER_VALIDATE_EMAIL,
    "site" => FILTER_VALIDATE_URL,
    "script" => FILTER_SANITIZE_STRIPPED
];

var_dump(filter_var_array($arrDataFilter, $dataPreFilter));