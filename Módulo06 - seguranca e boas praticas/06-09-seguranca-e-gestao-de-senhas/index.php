<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.09 - Segurança e gestão de senhas");

require __DIR__ . "/../source/autoload.php";

session();

/*
 * [ password hashing ] Uma API PHP para gerenciamento de senhas de modo seguro.
 */
fullStackPHPClassSession("password hashing", __LINE__);

$passwd = password_hash("12345", PASSWORD_DEFAULT);
var_dump($passwd);

var_dump([
    password_get_info($passwd),
    password_needs_rehash($passwd, PASSWORD_DEFAULT, ["cost" => 10]),
    password_verify(12345, $passwd)
]);

/*
 * [ password saving ] Rotina de cadastro/atualização de senha
 */
fullStackPHPClassSession("password saving", __LINE__);

$user = (new \Source\Models\User())->load(10);
$user->password = $passwd;
$user->save();

var_dump(password_verify(12345, $user->password));

var_dump($user);

/*
 * [ password verify ] Rotina de vetificação de senha
 */
fullStackPHPClassSession("password verify", __LINE__);

$login = user()->find("elton35@email.com.br");
var_dump($login);

if(!$login) { 
    echo message()->error("E-mail informado não confere!");
} elseif(!password_verify(12345, $login->password)) {
    echo message()->error("Senha informada não confere!");
} else {
    $login->password = password_hash(12345, PASSWORD_DEFAULT);
    $login->save();

    session()->set("login", $login->data());

    echo message()->success("Bem-vindo(a) de volta {$login->first_name}");
    var_dump(session()->all());
}


/*
 * [ password handler ] Sintetizando uso de senhas
 */
fullStackPHPClassSession("password handler", __LINE__);

$pass = "182";

var_dump([
    $pass,
    $passwd = passwd($pass),
    passwd_verify($pass, $passwd),
    passwd_rehash($passwd)
]);