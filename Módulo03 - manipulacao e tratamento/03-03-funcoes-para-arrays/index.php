<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.03 - Funções para arrays");

/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$index = [
    "AC/DC",
    "Nirvana",
    "Alter Bridge",
];

$assoc = [
    "band_1" => "AC/DC",
    "band_2" => "Nirvana",
    "band_3" => "Alter Bridge",
];

// Array_unshift — Adiciona um ou mais elementos no início de um array
array_unshift($index, "", "Pearl Jam");
// Incluindo no inicio da array associativa, pois foi somado a array já existente no final
$assoc = ["band_4" => "Pearl Jam", "band_5" => ""] + $assoc;

// Array_push — Adiciona um ou mais elementos no final de um array
array_push($index, "");
// Incluindo no final da array associativa, pois foi somado a array já existente antes da inclusão
$assoc = $assoc + ["band_6" => ""];

// Array_shift — Retira o primeiro elemento de um array
array_shift($index);
array_shift($assoc);

// Array_pop — Extrai um elemento do final da array
array_pop($index);
array_pop($assoc);

// Array_unshift — Adiciona um ou mais elementos no início de um array
array_unshift($index, "");

// Remove os elementos vazios da array
$index = array_filter($index);
$assoc = array_filter($assoc);

var_dump(
    $index,
    $assoc
);

/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);


/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);


/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);
