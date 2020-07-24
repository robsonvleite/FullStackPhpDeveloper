<?php

namespace Source\Core;

class Session
{
    public function __construct()
    {
        // Verifica se ainda não existe uma sessão ativa
        if (!session_id()) {
            session_save_path(CONF_SESS_PATH);
            session_start();
        }
    }

    public function __get($name)
    {
        if(!empty($_SESSION[$name])) {
            return $_SESSION[$name];
        }

        return null;
    }

    public function __isset($name)
    {
        $this->has($name);
    }

    // Retornando/Obtendo a sessão
    public function all(): ?object
    {
        return (object)$_SESSION;
    }


    public function set(string $key, $value): Session
    {
        var_dump($key, $value);
        $_SESSION[$key] = (is_array($value) ? (object)$value : $value);
        return $this;
    }

    // Removendo um índice da sessão
    public function unset(string $key): Session
    {
        unset($_SESSION[$key]);
        return $this;
    }

    // Se existir o índice o retorno é true, se não falso
    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    // Regenera a sessão mantendo os dados, trocando apenas o session_id. Deletando assim o outro arquivo da seessão que não será mais utilizado
    public function regenerate(): Session
    {
        session_regenerate_id(true);
        return $this;
    }

    
    // Deletando a sessão(log off)
    public function destroy(): Session
    {
        session_destroy();
        return $this;
    }

    /**
     * @return null|Message
     */
    public function flash(): ?Message
    {
        if($this->has("flash")) {
            $flash = $this->flash;
            $this->unset("flash");
            return $flash;
        }

        return null;
    }
}
