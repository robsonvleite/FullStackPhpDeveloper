<?php

use Source\Models\UserModel;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.10 - Model bootstrap e cadastro");

require __DIR__ . "/../source/autoload.php";

/*
 * [ bootstrap ] Inicialização de dados
 */
fullStackPHPClassSession("bootstrap", __LINE__);

$model = new UserModel();
$user = $model->bootstrap(
    "ricardo",
    "Barbosdasa",
    "",
    "38649523870"
);

var_dump($user);

/*
 * [ save create ] Salvar o usuário ativo (Active Record)
 */
fullStackPHPClassSession("save create", __LINE__);

if(!$model->find($user->email)) {
    echo "<p class='trigger warning'>Cadastro</p>";
    $user->save();
} else {
    echo "<p class='trigger accept'>Read</p>";
    $user = $model->find($user->email);
}

var_dump($user);