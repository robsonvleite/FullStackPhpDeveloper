<?php

namespace Source\Models;

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
    public function load($id)
    {
        
    }

    /**
     * Buscando um usuário pelo email
     */
    public function find($email)
    {

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