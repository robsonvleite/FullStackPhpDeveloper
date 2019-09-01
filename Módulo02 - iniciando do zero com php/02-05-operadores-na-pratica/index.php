<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
echo fullStackPHPClassName("02.05 - Operadores na prática");

/**
 * [ operadores ] https://php.net/manual/pt_BR/language.operators.php
 * [ atribuição ] https://php.net/manual/pt_BR/language.operators.assignment.php
 */
fullStackPHPClassSession("atribuição", __LINE__);

    $operatorA = 5;
    $operators = [
        "a += 5" => ($operatorA += 5),
        "a -= 5" => ($operatorA -= 5),
        "a *- 5" => ($operatorA *= 5),
        "a /= 5" => ($operatorA /= 5)
    ];
    var_dump($operators);


    $incrementA = 5;
    $incrementB = 5;
    $increment = [
        "pós-incremento" => $incrementA++,
        "res-incremento" => $incrementA,
        "pré-incremento" => ++$incrementA,
        "pós-decremento" => $incrementB--,
        "res-decremento" => $incrementB,
        "pré-decremento" => --$incrementB,
    ];
    var_dump($increment);

/**
 * [ comparação ] https://php.net/manual/pt_BR/language.operators.comparison.php
 */
fullStackPHPClassSession("comparação", __LINE__);


/**
 * [ lógicos ] https://php.net/manual/pt_BR/language.operators.logical.php
 */
fullStackPHPClassSession("lógicos", __LINE__);


/**
 * [ aritiméticos ] https://php.net/manual/pt_BR/language.operators.arithmetic.php
 */
fullStackPHPClassSession("aritiméticos", __LINE__);
