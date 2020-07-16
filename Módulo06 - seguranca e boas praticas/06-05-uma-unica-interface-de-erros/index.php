<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.05 - Uma única interface de erros");

require __DIR__ . "/../source/autoload.php";

/*
 * [ message class ] Uma classe padrão para reportar ao usuário
 */
fullStackPHPClassSession("message class", __LINE__);


/*
 * [ message types ] Métodos para cada tipo de mensagem
 */
fullStackPHPClassSession("message types", __LINE__);


/*
 * [ json message ] Mudando o padrão de retorno
 */
fullStackPHPClassSession("json message", __LINE__);


/*
 * [ flash message ] Uma mensagem via sessão para refresh de navegação
 */
fullStackPHPClassSession("flash message", __LINE__);


