<?php

// Método que registra as classes que serão carregadas, através dos operador new
spl_autoload_register(function($class) {

    $namespace = "Source\\"; // Duas barras para fazer o escape, sendo considerado só uma
    $baseDir = __DIR__ . "/";
    $len = strlen($namespace); // Contando quantos caracteres tem 

    if(strncmp($namespace, $class, $len) !== 0) { // strncmp — Comparação de string segura para binário para os primeiros n caracteres
        return;
    }

    $relativeClass = substr($class, $len);

    $file = $baseDir . str_replace("\\", "/", $relativeClass) . ".php";

    if(file_exists($file)) {
        require $file;
    }

    var_dump(
        $class,
        $namespace,
        $baseDir,
        $len,
        $relativeClass,
        $file
    );
});