<?php

namespace Source\Database;

use Exception;
use \PDO;
use \PDOException;

class Connect 
{
    private const HOST = "localhost";
    private const DBNAME = "fullstackphp";
    private const USER = "root";
    private const PASSWD = "";
    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Dizendo que todo erro que acontecer através da PDO vai ser tratado através de uma exceção
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // Qualquer resultado virá através de um objeto
        PDO::ATTR_CASE => PDO::CASE_NATURAL // Garante o uso sos mesmos nomes das colunas que vem do BD (outras opções seriam: CASE_UPPER/CASE_LOWER)
    ];

    private static $instance;

    /**
     * Get the value of instance
     * 
     * static é usado para definir que um método ou atributo em uma classe é estático. Isso significa que aquele método/atributo pertence à classe e não à uma instância dela e, por isso, pode ser acessado sem instânciar um novo objeto.
     */ 
    public static function getInstance(): PDO
    {
        if(empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    "mysql:host=". self::HOST .";dbname=". self::DBNAME, // dsn 
                    self::USER, // username BD
                    self::PASSWD, // password DB
                    self::OPTIONS 
                );
            } catch (Exception $exception) {
                die("<h1 class='trigger'>Whooops! Erro ao conectar ... </h1>");
            }
        }

        return self::$instance;
    }

    final private function __construct()
    {
    }

    final private function __clone()
    {
    }
}