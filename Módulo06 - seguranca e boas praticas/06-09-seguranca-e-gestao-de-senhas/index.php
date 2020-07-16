<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.09 - Segurança e gestão de senhas");

require __DIR__ . "/../source/autoload.php";

/*
 * [ password hashing ] Uma API PHP para gerenciamento de senhas de modo seguro.
 */
fullStackPHPClassSession("password hashing", __LINE__);


/*
 * [ password saving ] Rotina de cadastro/atualização de senha
 */
fullStackPHPClassSession("password saving", __LINE__);


/*
 * [ password verify ] Rotina de vetificação de senha
 */
fullStackPHPClassSession("password verify", __LINE__);


/*
 * [ password handler ] Sintetizando uso de senhas
 */
fullStackPHPClassSession("password handler", __LINE__);
