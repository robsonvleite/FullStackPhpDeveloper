<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.05 - Uma única interface de erros");

require __DIR__ . "/../source/autoload.php";
use \Source\Core\Message;

/*
 * [ message class ] Uma classe padrão para reportar ao usuário
 */
fullStackPHPClassSession("message class", __LINE__);

$message = new Message();
var_dump($message, get_class_methods($message));

/*
 * [ message types ] Métodos para cada tipo de mensagem
 */
fullStackPHPClassSession("message types", __LINE__);

$error = $message->success("Essa é uma mensagem de sucesso!");
var_dump([
    $message->getText(),
    $message->getType(),
    $message->render()
]);

echo $message->info("Mensagem renderizada!");
echo $message->success("Mensagem renderizada!");
echo $message->warning("Mensagem renderizada!");
echo $message->error("Mensagem renderizada!");

/*
 * [ json message ] Mudando o padrão de retorno
 */
fullStackPHPClassSession("json message", __LINE__);


/*
 * [ flash message ] Uma mensagem via sessão para refresh de navegação
 */
fullStackPHPClassSession("flash message", __LINE__);


