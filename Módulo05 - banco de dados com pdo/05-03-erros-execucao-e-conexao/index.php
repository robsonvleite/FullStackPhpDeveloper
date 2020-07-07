<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.03 - Errors, conexão e execução");

/*
 * [ controle de erros ] http://php.net/manual/pt_BR/language.exceptions.php
 */
fullStackPHPClassSession("controle de erros", __LINE__);

// try -> executa e catch -> trata os erros
try {
    // throw new Exception("Exception");
    throw new PDOException("PDOException");
    // throw new ErrorException("ErrorException");
} catch (PDOException | ErrorException $exception) {
    var_dump($exception);
} catch (Exception $exception) {
    echo "<p class='trigger error'>{$exception->getMessage()}</p>";
} finally { // Executado ao final da cadeia de validação
    echo "<p class='trigger'>Execução finalizada!!!</p>";
}

/*
 * [ php data object ] Uma classe PDO para manipulação de banco de dados.
 * http://php.net/manual/pt_BR/class.pdo.php
 */
fullStackPHPClassSession("php data object", __LINE__);

try {
    // Conexão com o Banco de Dados
    $pdo = new PDO(
        "mysql:host=localhost;dbname=fullstackphp", // dsn 
        "root", // username BD
        "",
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" // Passando o mesmo padrão utf8 do nosso BD
        ]
    );

    $stmt = $pdo->query("SELECT * FROM users LIMIT 3");
    // fetch -> enquanto tiver resultado no fetch o while continuará o looping
    // fetch(PDO::FETCH_ASSOC) -> Trazendo o resultado em uma array associativa
    while($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
        var_dump($user);
    }

} catch (PDOException $exception) {
    var_dump($exception);
}

/*
 * [ conexão com singleton ] Conextar e obter um objeto PDO garantindo instância única.
 * http://br.phptherightway.com/pages/Design-Patterns.html
 */
fullStackPHPClassSession("conexão com singleton", __LINE__);

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

$pdo1 = Connect::getInstance();
$pdo2 = Connect::getInstance();

var_dump(
    $pdo1,
    $pdo2,
    Connect::getInstance(),
    Connect::getInstance()::getAvailableDrivers(), // Entendendo com quais BD's o meu PHP consegue trabalhar
    Connect::getInstance()->getAttribute(PDO::ATTR_DRIVER_NAME) // Mostrando qual driver(BD estou usando)
    
);