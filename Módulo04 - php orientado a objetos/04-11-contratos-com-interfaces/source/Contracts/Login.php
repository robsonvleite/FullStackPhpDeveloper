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
}
