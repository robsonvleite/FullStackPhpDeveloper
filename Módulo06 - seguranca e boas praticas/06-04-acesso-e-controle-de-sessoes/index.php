<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.04 - Acesso e controle de sessões");

require __DIR__ . "/../source/autoload.php";

/*
 * [ session ] Uma classe statless para manipulação de sessões
 */
fullStackPHPClassSession("session", __LINE__);

$session = new \Source\Core\Session();
$session->set("user", 1);
$session->regenerate();
$session->set("stats", ["name", "email"]);
$session->unset("stats");

if(!$session->has("login")) {
    echo "<p>Logar-se</p>";

    $user = (new \Source\Models\User())->load(1);
    $session->set("login", $user);
}

$session->destroy();

var_dump(
    $_SESSION,
    $session->all(),
    $session->stats,
    session_id()
);