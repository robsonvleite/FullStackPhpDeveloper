<?php

namespace Source\Models;

use Source\Database\Connect;

// abstract - Não pode ser implementada por um obj e somente herdada por outras classes
abstract class Model 
{
    /** @var object|null */
    protected $data;

    /** @var \PDOException|null */
    protected $fail;

    /** @var string|null */
    protected $message;

    // Sempre que atribuir a uma propriedade que não esteja acessível, vamos manipular e jogar na camada $data
    public function __set($name, $value)
    {
        if(empty($this->data)) {
            $this->data = new \stdClass();
        }

        $this->data->$name = $value;
    }

    public function __isset($name)
    {
        return $this->data->$name;
    }

    public function __get($name)
    {
        return ($this->data->$name ?? null);   
    }

    /**
     * Get the value of data
     */ 
    public function data(): ?object
    {
        return $this->data;
    }

    /**
     * Get the value of fail
     */ 
    public function fail(): ?\PDOException
    {
        return $this->fail;
    }

    /**
     * Get the value of message
     */ 
    public function message(): ?string
    {
        return $this->message;
    }

    protected function create()
    {

    }

    protected function read(string $select, string $params = null): ?\PDOStatement
    {
        try {
            $stmt = Connect::getInstance()->prepare($select);

            if($params) {
                parse_str($params, $params);
                foreach ($params as $key => $value) {
                    $type = (is_numeric($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR);
                    $stmt->bindValue(":{$key}", $value, $type);
                }
            }

            $stmt->execute();
            return $stmt;

        } catch (\PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
    }

    protected function update()
    {

    }

    protected function delete()
    {

    }

    protected function safe(): ?array
    {

    }

    protected function filter()
    {

    }
}