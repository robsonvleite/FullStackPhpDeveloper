<?php

use Source\Core\Message;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.08 - Camada de manipulação pt3");

require __DIR__ . "/../source/autoload.php";

/*
 * [ validate helpers ] Funções para sintetizar rotinas de validação
 */
fullStackPHPClassSession("validate", __LINE__);

$message = new Message();

$email = "ricardo@gmail.com";
if(!is_email($email)) {
    echo $message->error("E-mail inválido!");
} else {
    echo $message->success("E-mail válido!");
}

$passwd = 12345678;
if(!is_password($passwd)) {
    echo $message->error("Password menor ou maior que a quantidade permitida!");
} else {
    echo $message->success("Password cadastrado!");
}

/*
 * [ navigation helpers ] Funções para sintetizar rotinas de navegação
 */
fullStackPHPClassSession("navigation", __LINE__);


/*
 * [ class triggers ] São gatilhos globais para criação de objetos
 */
fullStackPHPClassSession("triggers", __LINE__);


