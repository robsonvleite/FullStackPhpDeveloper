<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.12 - Efetuando cadastro de usuário");

require __DIR__ . "/../source/autoload.php";

/*
 * [ register ] Uma rotina de cadastro blindada contra ataques XSS e CSRF.
 */
fullStackPHPClassSession("register", __LINE__);