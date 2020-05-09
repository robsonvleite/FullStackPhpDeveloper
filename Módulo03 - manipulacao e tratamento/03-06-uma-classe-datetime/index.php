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

$dateInterval = new DateInterval("P10Y2MT10M"); // P = Períod, 10Y = 10 years, 2M = 2 months, T = Time, 10M = 10 minutes;

var_dump($dateInterval);

$dateTime = new DateTime("now"); // Pegando a data e horário atual
$dateTime->add($dateInterval); // Adicionando um intervalo ao $dateIime(atual/horário de agora) 
$dateTime->sub($dateInterval); // Subtraindo um intervalo ao $dateTime(atual/horário de agora) 

var_dump($dateTime);

$birth = new DateTime(date("Y") . "-07-21");
$dateNow = new DateTime("now");
$diffDates = $dateNow->diff($birth); // Tirando a diferença entre as datas/variáveis

var_dump([
    "Horário atual" => $dateNow,
    "Meu aniversáio será em" => $birth,
    "Diferença das datas" => $diffDates,
]);

if($diffDates->invert) { // Se o invert for = 0 -> siginifica que a data chegará.  Se o invert for = 1 -> siginifica que a data já passou.
    echo "<p>Seu aniversário foi à {$diffDates->days} dias.</p>";
} else {
    echo "<p>Faltam {$diffDates->days} dias para seu aniversário!</p>";
}

$dateResources = new DateTime("now");

var_dump([
    $dateResources,
    $dateResources->format(DATE_BR),
    $dateResources->sub(DateInterval::createFromDateString("10days"))->format(DATE_BR), // Utilizando a interface estática de intervalos e subtraindo 10 dias 
    $dateResources->add(DateInterval::createFromDateString("10days"))->format(DATE_BR), // Utilizando a interface estática de intervalos e adicionando 10 dias 
]);

/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);

$start = new DateTime("2020-01-09");
$interval = new DateInterval("P1M");
$end = new DateTime("2020-12-10"); 
$period = new DatePeriod($start, $interval, $end);

var_dump([
    "start" => $start->format(DATE_BR),
    "interval" => $interval,
    "end" => $end->format(DATE_BR)
], $period, get_class_methods($period));
echo "<br>";
define("INVOICE_DATE", "d/m/Y");
echo "<h1>Sua assinatura</h1>";
foreach($period as $recurrences) {
    echo "<p>Próximo vencimento da sua fatura:  <b style='font-size:1.2em'>{$recurrences->format(INVOICE_DATE)}</b></p>";
}