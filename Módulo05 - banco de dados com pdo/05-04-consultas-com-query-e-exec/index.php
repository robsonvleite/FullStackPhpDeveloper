<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.04 - Consultas com query e exec");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

/*
 * [ insert ] Cadastrar dados.
 * https://mariadb.com/kb/en/library/insert/
 *
 * [ PDO exec ] http://php.net/manual/pt_BR/pdo.exec.php
 * [ PDO query ]http://php.net/manual/pt_BR/pdo.query.php
 */
fullStackPHPClassSession("insert", __LINE__);

$insert = "
    INSERT INTO users (first_names, last_name, email, document)
    VALUES ('Ricardo', 'Barbosa', 'ricardo_baldrez@gmail.com', '182');
";

try {
    // exec -> comando rápido e simples retornando um boolean utilizando o minimo de recursos. Trazendo poucas info's no retorno
    // $exec = Connect::getInstance()->exec($insert);
    // var_dump(Connect::getInstance()->lastInsertId()); // Pegando o id da inserção

    // query -> comando mais exuto que retorna muito mais informações 
    $exec = Connect::getInstance()->query($insert);
    var_dump(Connect::getInstance()->lastInsertId());

} catch (PDOException $execption) {
    var_dump($execption);
}

/*
 * [ select ] Ler/Consultar dados.
 * https://mariadb.com/kb/en/library/select/
 */
fullStackPHPClassSession("select", __LINE__);


/*
 * [ update ] Atualizar dados.
 * https://mariadb.com/kb/en/library/update/
 */
fullStackPHPClassSession("update", __LINE__);


/*
 * [ delete ] Deletar dados.
 * https://mariadb.com/kb/en/library/delete/
 */
fullStackPHPClassSession("delete", __LINE__);