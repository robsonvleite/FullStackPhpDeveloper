<?php

namespace Source\Models;

use DateTime;
use Source\Database\Entity\UserEntity;

class UserModel extends Model
{
    /** @var array $safe no update or create */
    protected static $safe = ["id", "created_at", "updated_at"];

    /** @var string $entity database table */
    protected static $entity = "users";

    /**
     * Ajuda a construir os dados necessários para poder cadastrar um novo usuário
     */
    public function bootstrap(string $firstName, string $lastName, string $email, string $document = null): ?UserModel
    {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->document = $document;

        return $this;
    }

    /**
     * Buscando um usuário pelo id
     */
    public function load(int $id, string $columns = "*"): ?UserModel
    {
        $load = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE id = :id", "id={$id}");
        
        if($this->fail() || !$load->rowCount()) {
            $this->message = "Usuário não encontrado para o id informado!!!";
            return null;
        }

        return $load->fetchObject(__CLASS__);
    }

    /**
     * Buscando um usuário pelo email
     */
    public function find($email, string $columns = "*"): ?UserModel
    {
        $load = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE email = :email", "email={$email}");

        if ($this->fail() || !$load->rowCount()) {
            $this->message = "Usuário não encontrado para o email informado!!!";
            return null;
        }

        return $load->fetchObject(__CLASS__);
    }

    /**
     * Buscando todos os resultados
     */
    public function all(int $limit = 30, int $offset = 0, string $columns = "*"): ?array
    {
        $all = $this->read("SELECT {$columns} FROM " . self::$entity . " LIMIT :limit OFFSET :offset", "limit={$limit}&offset={$offset}");

        if ($this->fail() || !$all->rowCount()) {
            $this->message = "Sua consulta não retornou usuários!!!";
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * Responsável por cadastrar/salvar o novo usuário na base
     */
    public function save(): ?UserModel
    {
        if(!$this->required()) {
            return null;
        }

        var_dump($this->first_name, $this->last_name);
        /** User Update */
        if (!empty($this->id)) {
            $userId = $this->id;
        }

        /** User Create */
        if(empty($this->id)) {
            if($this->find($this->email)) {
                $this->message = "O e-mail informado já está cadastrado!";
                return null;
            }

            $userId = $this->create(self::$entity, $this->safe());
            if($this->fail()) {
                $this->message = "Erro ao cadastrar, verifique os dados";
            }

            $this->message = "Cadastro realizado com sucesso!";
        }  

        $this->data = $this->read("SELECT * FROM users WHERE id = :id", "id={$userId}")->fetch();
        return $this;
    }

    /**
     * Deletando um usuário
     */
    public function destroy()
    {
        
    }

    /**
     * Diz quais campos o BD faz de obrigatório ser informado pelo usuário ao se cadastrar
     */
    private function required():bool
    {
        if(empty($this->first_name) || empty($this->last_name) || empty($this->email)) {
            $this->message = "Os campos são obrigatórios";
            return false;
        }

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->message = "O e-mail não é válido";
            return false;
        }

        return true;
    }
}