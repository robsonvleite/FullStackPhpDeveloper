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


/**
 * [ parse string ] parse_str | mb_parse_str
 */
fullStackPHPClassSession("parse string", __LINE__);