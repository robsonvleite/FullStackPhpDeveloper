<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.07 - Estruturas de controle");

/*
 * [ if ] https://php.net/manual/pt_BR/control-structures.if.php
 * [ elseif ] https://php.net/manual/pt_BR/control-structures.elseif.php
 * [ else ] https://php.net/manual/pt_BR/control-structures.else.php
 */
fullStackPHPClassSession("if, elseif, else", __LINE__);

    $test = true;

    if ($test) {
        var_dump(true);
    } else {
        var_dump(false);
    }

    $age = 51;

    if ($age < 20) {
        var_dump("Bandas Coloridas");
    } elseif ($age > 20 && $age < 50) {
        var_dump("Ótimas Bandas");
    } else {
        var_dump("Rock And Roll Raiz");
    }

    $hour = 3;

    if ($hour >= 5 && $hour < 23) {
        if ($hour < 7) {
            var_dump("Bob Marley");
        } else {
            var_dump("After Bridge");
        }
    } else {
        var_dump("ZzzzzzZZZZ");
    }

/*
 * [ isset ] https://php.net/manual/pt_BR/function.isset.php
 * [ empty] https://php.net/manual/pt_BR/function.empty.php
 */
fullStackPHPClassSession("isset, empty, !", __LINE__);


/*
 * [ switch ] https://secure.php.net/manual/pt_BR/control-structures.switch.php
 */
fullStackPHPClassSession("switch", __LINE__);




