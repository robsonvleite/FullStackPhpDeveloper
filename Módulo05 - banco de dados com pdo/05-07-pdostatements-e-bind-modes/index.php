<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.07 - PDOStatement e bind modes");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

// Prepare Statement -> São métodos que compõe rotinas que vão preparar a sua instrução SQL antes de executar no banco de dados, assim o PDO vai tratar os dados que serão inseridos, consultados e etc ... garantindo assim uma segurança maior

/**
 * [ prepare ] http://php.net/manual/pt_BR/pdo.prepare.php
 */
fullStackPHPClassSession("prepared statement", __LINE__);

// Preparando para a execução da query
$stmt = Connect::getInstance()->prepare("SELECT * FROM users LIMIT 1");
// Executando
$stmt->execute();

var_dump(
    $stmt,
    $stmt->rowCount(),
    $stmt->columnCount(),
    $stmt->fetch()
);

/*
 * [ bind value ] http://php.net/manual/pt_BR/pdostatement.bindvalue.php
 *
 */
fullStackPHPClassSession("stmt bind value", __LINE__);

// bind value -> É a substituição de posições na sua instrução SQL por valores tratados pelo PDO

// $stmt = Connect::getInstance()->prepare(
//     "INSERT INTO users (first_name, last_name, email, document) VALUES (?, ?, ?, ?)"
// );

// $stmt->bindValue(1, "Gustavo", PDO::PARAM_STR);
// $stmt->bindValue(2, "Web", PDO::PARAM_STR);
// $stmt->bindValue(3, "gustavo@hotmail.com", PDO::PARAM_STR);
// $stmt->bindValue(4, "2", PDO::PARAM_INT);

// $stmt->execute();

// var_dump(
//     $stmt,
//     $stmt->rowCount(),
//     Connect::getInstance()->lastInsertId()
// );

$nome = "Nathália";

$stmt = Connect::getInstance()->prepare(
    "INSERT INTO users (first_name, last_name, email, document) VALUES (:first_name, :last_name, :email, :document)"
);

$stmt->bindValue(":first_name", $nome, PDO::PARAM_STR);
$stmt->bindValue(":last_name", "Oliveira", PDO::PARAM_STR);
$stmt->bindValue(":email","nathália@gmail.com", PDO::PARAM_STR);
$stmt->bindValue(":document","5", PDO::PARAM_INT);

$stmt->execute();

var_dump(
    $stmt,
    $stmt->rowCount(),
    Connect::getInstance()->lastInsertId()
);

if(Connect::getInstance()->lastInsertId() > 50) {
    Connect::getInstance()->exec("DELETE FROM users WHERE id > 50");
}

/*
 * [ bind param ] http://php.net/manual/pt_BR/pdostatement.bindparam.php
 */
fullStackPHPClassSession("stmt bind param", __LINE__);

// Diferente do bind value, o bind param não deixa passar o nome diretamente, ele fará a validação no execute() ... Só interpretará com variáveis
$stmt = Connect::getInstance()->prepare(
    "INSERT INTO users (first_name, last_name) VALUES (:first_name, :last_name)"
);

$name = "Gah";
$lastName = "Morandi";

$stmt->bindParam(":first_name", $name, PDO::PARAM_STR);
$stmt->bindParam(":last_name", $lastName, PDO::PARAM_STR);

$stmt->execute();

var_dump(
    $stmt,
    $stmt->rowCount(),
    Connect::getInstance()->lastInsertId()
);

/*
 * [ execute ] http://php.net/manual/pt_BR/pdostatement.execute.php
 */
fullStackPHPClassSession("stmt execute array", __LINE__);

$stmt = Connect::getInstance()->prepare(
    "INSERT INTO users (first_name, last_name, email) VALUES (:first_name, :last_name, :email)"
);

$user = [
    "first_name" => "Kaue",
    "last_name" => "Cardoso",
    "email" => "caue@upinside.com.br"
];

$stmt->execute($user);

var_dump(
    $stmt,
    $stmt->rowCount()
);

/*
 * [ bind column ] http://php.net/manual/en/pdostatement.bindcolumn.php
 */
fullStackPHPClassSession("bind column", __LINE__);

$stmt = Connect::getInstance()->prepare("SELECT * FROM users LIMIT 3");
$stmt->execute();

// Utilizando o índice do obj
// $stmt->bindColumn(2, $nome);
// $stmt->bindColumn(4, $email);

// Utilizando o nome da coluna
$stmt->bindColumn("first_name", $nome);
$stmt->bindColumn("email", $email);


while ($user = $stmt->fetch()) {
    var_dump($user);
    echo "O e-mail de {$nome} é {$email}";
}