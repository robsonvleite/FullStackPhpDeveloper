<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.05 - Manipulação de datas");

/*
 * [ a função date ] setup | output
 * [ date ] https://php.net/manual/pt_BR/function.date.php
 * [ timezones ] https://php.net/manual/pt_BR/timezones.php
 */
fullStackPHPClassSession("a função date", __LINE__);

var_dump([
    date_default_timezone_get(),
    date(DATE_W3C),
    date("d/m/Y H:i:s")
]);

define("DATE_BR", "d/m/Y H:i:s");
// define("DATE_TIMEZONE", "Pacific/Apia");
define("DATE_TIMEZONE", "America/Sao_Paulo");

date_default_timezone_set(DATE_TIMEZONE);

var_dump([
    date_default_timezone_get(),
    date(DATE_BR),
    date(DATE_W3C),
]);
var_dump([
    "getdate" => getdate(),
]);

echo "<p>Hoje é dia ", getdate()['mday'] , "</p>";

/**
 * [ string to date ] strtotime | strftime
 */
fullStackPHPClassSession("string to date", __LINE__);

var_dump([
    "strtotime NOW" => strtotime("now"), // Time atual
    "time" => time(), // Atalho para strtotime("now")
    "strtotime+10dias" => strtotime("+10days"),
    "date DATE_BR" => date(DATE_BR),
    "date +10days" => date(DATE_BR, strtotime("+10days")), // Incluindo mais 10 dias
    "date -10days" => date(DATE_BR, strtotime("-10days")), // Subtraindo 10 dias
    "date +year" => date(DATE_BR, strtotime("+1year")), // Incluindo mais 1 ano (year/years)
]);

$format = "%d/%m/%Y %Hhoras %Mminutos %Ssegundos";
echo "<p>A data de hoje é ", strftime($format) , "</p>";
echo strftime("<p>Hoje é dia %d do %m de %Y às %H horas e %m minutos</p>");