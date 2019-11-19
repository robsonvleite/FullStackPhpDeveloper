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

// array_reverse — Retorna um array com os elementos na ordem inversa
$index = array_reverse($index);
$assoc = array_reverse($assoc);

// asort — Ordena um array mantendo a associação entre índices e valores
asort($index);
asort($assoc);

ksort($index); // ksort — Ordena um array pelas chaves
krsort($assoc); // krsort — Ordena um array pelas chaves em ordem descrescente

sort($index); // sort — Ordena um array
rsort($index); // rsort — Ordena um array em ordem descrescente

var_dump([
    $index,
    $assoc
]);

/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

var_dump(
    [
        array_keys($assoc),
        array_values($assoc)
    ]
);

// in_array — Checa se um valor("AC/DC") existe em um array($assoc)
if (in_array("AC/DC", $assoc)) {
    echo "<p>Cause I`m back!</p>";
} else {
    echo "<p>Não estou na array</p>";
}

// implode — Junta elementos de uma matriz em uma string
// Nesse caso separando cada elemento por ', '
$arrToString = implode(", ", $assoc);
echo "<p>{$arrToString}</p>";
echo "<p>Eu curto {$arrToString} e muitas outras!</p>";

// explode - Transforma a string de volta em uma array
var_dump(explode(", ", $arrToString));

/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);

$profile = [
    "name" => "Robson",
    "company" => "UpInside",
    "mail" => "cursos@upinside.com.br"
];

$template = <<<TPL
   <article>
      <h1>{{name}}</h1>
      <p>{{company}}<br>
      <a href="mailto:{{mail}}" title="Enviar e-mail para {{name}}">Enviar E-mail</a></p>
   </article>
TPL;

echo $template;

echo str_replace(
    array_keys($profile), array_values($profile), $template
);

$replaces = "{{" . implode("}}&{{", array_keys($profile)) . "}}";

// var_dump(explode("&", $replaces));
echo str_replace(
    explode("&", $replaces),
    array_values($profile),
    $template
);