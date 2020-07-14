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
    public function bootstrap()
    {
        
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
    public function all($limit = 30, $offset = 0)
    {

    }

    /**
     * Responsável por cadastrar/salvar o novo usuário na base
     */
    public function save()
    {
    
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
    private function required()
    {
        
    }
}