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
    "localhost", // qual dominio ele vale
    true // garantindo que ele somente acesse seu dominio com segurança
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

$folder = __DIR__ . "/ses";
if(!file_exists($folder) || !is_dir($folder)) {
    mkdir($folder, 0755);
} else {
    echo "<p class='trigger accept'>O dir já existe</p>";
}

session_save_path(__DIR__ . "/ses"); // Pasta que salvaremos nossa sessão
session_name("FSPHPSESSID"); // Dando um nome a nossa sessão
session_start([
    "cookie_lifetime" => (60 * 60 * 24)
]); // iniciando a sessão(A sessão tem que ser iniciada logo na abertura do arquivo)

var_dump(
    $_SESSION, 
    [
        "id" => session_id(),
        "name" => session_name(),
        "status" => session_status(),
        "save_path" => session_save_path(),
        "cookie" => session_get_cookie_params()
    ]
);

// Criando a sessão (login & user)
$_SESSION['login'] = (object)$user;
$_SESSION['user'] = $user;

// Eliminando uma sessão específica
// unset($_SESSION['login']);

// Eliminando todas as sessões
session_destroy();

var_dump($_SESSION);