<?php

namespace Source\Traits;

trait UserTrait
{
    private $user;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
