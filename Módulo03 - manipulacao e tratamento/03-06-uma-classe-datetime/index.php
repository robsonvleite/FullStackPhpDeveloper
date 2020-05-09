<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.06 - Uma classe DateTime");

/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */
fullStackPHPClassSession("A classe DateTime", __LINE__);

define("DATE_BR", "d/m/Y H:i:s");

$dateNow = new DateTime();
$dateBirth = new DateTime("1990-07-21");
$dateStatic = DateTime::createFromFormat(DATE_BR, "10/03/2010 12:00:00"); // Utilizando a interface estática de dateTime e passando o formato.

var_dump([
    $dateNow,
    get_class_methods($dateNow),
    $dateBirth,
    $dateStatic,
]);

var_dump([
    $dateNow->format(DATE_BR),
    $dateNow->format("d"),
]);

echo "<p>Hoje é dia {$dateNow->format("d")} do  {$dateNow->format("m")} de {$dateNow->format("Y")} </p>";

$newTimeZone = new DateTimeZone("Pacific/Apia");
$newDatetime = new DateTime("now", $newTimeZone);

var_dump([
    $newTimeZone,
    $newDatetime,
    $dateNow
]);
/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);


/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);
