<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.09 - Membros de uma classe");

require __DIR__ . "/source/autoload.php";

/*
 * [ constantes ] http://php.net/manual/pt_BR/language.oop5.constants.php
 */
fullStackPHPClassSession("constantes", __LINE__);

use Source\Members\Config;

$config = new Config();
echo "<p>" . $config::COMPANY . "</p>";

var_dump(
    Config::COMPANY
    // Config::DOMAIN,
    // Config::SECTOR
);

$reflection = new ReflectionClass(Config::class); // Traz uma classe pronta para debugar qualquer rotina de classe

var_dump($config, $reflection, $reflection->getConstants(), get_class_methods($reflection));

/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("propriedades", __LINE__);


/*
 * [ métodos ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("métodos", __LINE__);


/*
 * [ exemplo ] Uma classe trigger
 */
fullStackPHPClassSession("exemplo", __LINE__);
