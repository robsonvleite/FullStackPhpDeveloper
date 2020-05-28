<?php

namespace Source\Contracts;

class Login
{
    private $logged;

    public function loginUser(User $user): User
    {
        $this->logged = $user;
        return $this->logged;
    }

    public function loginAdmin(UserAdmin $user): UserAdmin
    {
        $this->logged = $user;
        return $this->logged;
    }

    // Login geral(poderá ser utilizado em qualquer parte do sistema)
    // Qualquer objeto que tenha um FirstName, LastName e email implementados, poderão implementar a interface com isso podendo fazer o login no sistema
    public function login(UserInterface $user): UserInterface
    {
        $this->logged = $user;
        return $this->logged;
    }
}
