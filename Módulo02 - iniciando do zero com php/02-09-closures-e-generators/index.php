<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.09 - Closures e generators");

/*
 * [ closures ] https://php.net/manual/pt_BR/functions.anonymous.php
 */
fullStackPHPClassSession("closures", __LINE__);

    $myAge = function ($year) {
        $age = date("Y") - $year;
        return "<h5>Você tem {$age} anos!</h5>";
    };

    echo $myAge(1986);

    $priceBrl = function ($price) {
        return number_format($price, 2, ",", ".");
    };

    echo "<p>O projeto custa R$ {$priceBrl(3600)}. Vamos fechar?";

    $myCart = [];
    $myCart["totalPrice"] = 0;
    $cardAdd = function ($item, $qtd, $price) use (&$myCart) {
        $myCart[$item] = $qtd * $price;
        $myCart["totalPrice"] += $myCart[$item];
    };

    $cardAdd("HTML5", 1, 497);
    $cardAdd("jQuery", 2, 497);

    var_dump($myCart);

/*
 * [ generators ] https://php.net/manual/pt_BR/language.generators.overview.php
 */
fullStackPHPClassSession("generators", __LINE__);
