<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.02 - Funções para strings");

/*
 * [ strings e multibyte ] https://php.net/manual/en/ref.mbstring.php
 */
fullStackPHPClassSession("strings e multibyte", __LINE__);

$string = "O último show do AC/DC foi incrível!";

var_dump([
    "string" => $string,
    "strlen" => strlen($string), // Contando os caracteres, e os ascentos como + um caracter
    "mb_strlen" => mb_strlen($string), // Contando os caracteres, e os caracteres com ascentos contando como um só
    "substr" => substr($string, "9"), // Mostrando a partir do caracter 9, e os ascentos como + um caracter
    "mb_substr" => mb_substr($string, "9"), // Mostrando a partir do caracter 9, e os caracteres com ascentos contando como um só
    "strtoupper" => strtoupper($string), // Mostrando em caixa alta(tudo maiúsculo), sem deixar os caracteres com ascentos em caixa alta 
    "mb_strtoupper" => mb_strtoupper($string), // Mostrando em caixa alta(tudo maiúsculo), deixando os caracteres com ascentos em caixa alta
]);

/**
 * [ conversão de caixa ] https://php.net/manual/en/function.mb-convert-case.php
 */
fullStackPHPClassSession("conversão de caixa", __LINE__);

$mbString = $string;

var_dump([
    "mb_strtoupper" => mb_strtoupper($mbString),
    "mb_strtolower" => mb_strtolower($mbString),
    "mb_convert_case UPPER" => mb_convert_case($mbString, MB_CASE_UPPER),
    "mb_convert_case LOWER" => mb_convert_case($mbString, MB_CASE_LOWER),
    "mb_convert_case TITLE" => mb_convert_case($mbString, MB_CASE_TITLE),
]);

/**
 * [ substituição ] multibyte and replace
 */
fullStackPHPClassSession("substituição", __LINE__);

$mbReplace = $mbString . " Fui, iria novamente, e foi épico!";

var_dump([
    "mbReplace" => $mbReplace,
    "mb_strlen" => mb_strlen($mbReplace),
    "mb_strpos" => mb_strpos($mbReplace, ", "), // Contando até a primeira ocorrência de ','
    "mb_strrpos" => mb_strrpos($mbReplace, ", "), // Contando até a última ocorrência de ','
    "mb_substr" => mb_substr($mbReplace, 40 + 2, 14), // Contando do caracter 42 até os próximos 14
    // True = mostra até a primeira ocorrência de ','
    // False = mostra da primeira ocorrência, até o final
    "mb_strstr" => mb_strstr($mbReplace, ", ", false), 
    // True = mostra até a última ocorrência de ','
    // False = mostra da última ocorrência, até o final
    "mb_strrchr" => mb_strrchr($mbReplace, ", ", true)
]);


$mbStrReplace = $string;

echo "<p>", $mbStrReplace, "</p>";
echo "<p>", str_replace("AC/DC", "Nirvana", $mbStrReplace), "</p>"; // Substituindo AC/DC por Nirvana na variável(string) passada 
echo "<p>", str_replace(["AC/DC", "eu fui", "último"], "Nirvana", $mbStrReplace), "</p>"; // Substituindo vários valores por Nirvana somente na variável(string) passada 
echo "<p>", str_replace(["AC/DC", "incrível"], ["Nirvana", "ÉPICOOO!!"], $mbStrReplace), "</p>"; // Substituindo vários valores pela ordem das arrays na variável(string) passada 


$article = <<<ROCK
   <article>
      <h3>event</h3>
      <p>desc</p>
   </article>
ROCK;

$articleData = [
    "event" => "Rock in Rio",
    "desc" => $mbReplace
];

echo str_replace(array_keys($articleData), array_values($articleData), $article);

/**
 * [ parse string ] parse_str | mb_parse_str
 */
fullStackPHPClassSession("parse string", __LINE__);

$endPoint = "name=Robson&email=cursos@upinside.com.br";
mb_parse_str($endPoint, $parseEndPoint);

var_dump([
    $endPoint,
    $parseEndPoint,
    (object)$parseEndPoint
]);
