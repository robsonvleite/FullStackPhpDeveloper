<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.09 - Formuários e filtros");

/*
 * [ request ] $_REQUEST
 * https://php.net/manual/pt_BR/book.filter.php
 */
fullStackPHPClassSession("request", __LINE__);

$form = new stdClass();
$form->name = "Ricardo";
$form->mail = "ricardo.baldrez@gmail.com";

var_dump($_REQUEST);

$form->method = "get";
$form->method = "post";
include __DIR__ . "/form.php";

/*
 * [ post ] $_POST | INPUT_POST | filter_input | filter_var
 */
fullStackPHPClassSession("post", __LINE__);

var_dump($_POST);

// Pegando cada valor manualmente enviado pelo usuário
$postName = filter_input(INPUT_POST, "name", FILTER_DEFAULT);
$postMail = filter_input(INPUT_POST, "mail", FILTER_DEFAULT);

// Pegando todos os campos do fomr de uma vez enviado pelo usuário
$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);

var_dump([
    $postName,
    $postMail,
    $postArray
]);
    
if($postArray) {
    // in_array — Checa se um valor existe em um array(Checando se os campos estão vazios)
    if(in_array("", $postArray)) {
        echo "<p class='trigger warning'>Preencha todos os campos!</p>";
    } elseif(!filter_var($postArray['mail'], FILTER_VALIDATE_EMAIL)) { // filter_var = para verificar dados já recebidos
        echo "<p class='trigger warning'>E-mail informado não é válido!</p>";
    } else {
        // array_map = Realiza um callback em cada item da array,  realizando o callback chamado(strip_tags, trim e etc ...)
        $saveStrip = array_map("strip_tags", $postArray); // strip_tags = remove qualquer código que venha junto com o dado
        $save = array_map("trim", $saveStrip); // trim = remove qualquer espaço que seja desnecessário
        var_dump($save);

        echo "<p class='trigger accept'>Cadastro realizado com sucesso!</p>";
    }
}

$form->method = "post";
include __DIR__ . "/form.php";

/*
 * [ get ] $_GET | INPUT_GET | filter_input | filter_var
 */
fullStackPHPClassSession("get", __LINE__);

var_dump($_GET);
$get = filter_input(INPUT_GET, "mail", FILTER_DEFAULT);
$getArray = filter_input(INPUT_GET, FILTER_DEFAULT);

var_dump($get);

$form->method = "get";
include __DIR__ . "/form.php";

/*
 * [ filters ] list | id | var[_array] | input[_array]
 * http://php.net/manual/pt_BR/filter.constants.php
 */
fullStackPHPClassSession("filters", __LINE__);

var_dump(
    filter_list(),
    [
        filter_id("validate_email"),
        FILTER_VALIDATE_EMAIL,
        filter_id("string"),
        FILTER_SANITIZE_STRING
    ]
);

$filterForm = [
    "name" => FILTER_SANITIZE_STRIPPED, // Retira ou codifica caracteres indesejados
    "mail" => FILTER_VALIDATE_EMAIL
];

$getForm = filter_input_array(INPUT_GET, $filterForm); // Quando estamos ainda recebendo os dados
var_dump($getForm);

$email = "cursos@upinside.com.br";
var_dump(
    [
    filter_var($email, FILTER_VALIDATE_EMAIL)
    ],
    filter_var_array($getForm, $filterForm)
);