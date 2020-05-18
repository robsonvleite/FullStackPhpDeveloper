<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.12 - Cookies e sessões");

/*
 * [ cookies ] http://php.net/manual/pt_BR/features.cookies.php
 */
fullStackPHPClassSession("cookies", __LINE__);
// Mantém alguns dados salvos, mesmo que o usuário feche o navegador

setcookie("fsphp", "Cookie fsphp!", time() + 10); // Setando um cookie(nome, value, time + seconds)

$cookie = filter_input_array(INPUT_COOKIE, FILTER_SANITIZE_STRIPPED);

var_dump(
    $_COOKIE,
    $cookie
);

$time = time() + 60 * 60 * 24 * 7;
$user = [
    "name" => "root",
    "passwd" => "12345",
    "expire" => $time
];

setcookie(
    "fslogin", // name
    http_build_query($user), // dados do cookie(login)
    $time, // tempo de expiração do cookie
    "/", // valendo pra todo dominio
    "localhost" // qual dominio ele vale
    // true // garantindo que ele somente acesse seu dominio com segurança
);

$login = filter_input(INPUT_COOKIE, "fslogin", FILTER_SANITIZE_STRIPPED);

if($login) {
    var_dump($login);
    parse_str($login, $user);
    var_dump($user);
}


/*
 * [ sessões ] http://php.net/manual/pt_BR/ref.session.php
 */
fullStackPHPClassSession("sessões", __LINE__);
