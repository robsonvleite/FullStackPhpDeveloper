<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.09 - Métodos de busca e leitura");

require __DIR__ . "/../source/autoload.php";

/*
 * [ load ] Por primary key (id)
 */
fullStackPHPClassSession("load", __LINE__);

$model = new \Source\Models\UserModel();
$user = $model->load(1);

var_dump($user, "{$user->first_name} {$user->last_name}");

/*
 * [ find ] Por indexes da tabela (email)
 */
fullStackPHPClassSession("find", __LINE__);

$user = $model->find("eleno29@email.com.br");

var_dump($user, "{$user->email}");

/*
 * [ all ] Retorna diversos registros
 */
fullStackPHPClassSession("all", __LINE__);

$allUsers = $model->all(5);

/**
 * @var \Source\Models\UserModel $user
 */
foreach ($allUsers as $user) {
    var_dump($user);
}