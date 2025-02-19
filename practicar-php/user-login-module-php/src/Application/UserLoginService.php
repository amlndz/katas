<?php

namespace UserLoginService\Application;

use Exception;
use UserLoginService\Domain\User;

class UserLoginService
{
    /**
     * var User[]
     */
    private array $loggedUsers = [];

    /**
     * @throws Exception
     */
    public function manualLogin(User $user): void
    {
        $existingUser = array_filter($this->loggedUsers, fn ($loggedUser) => $loggedUser->userName() === $user->userName());

        if(!empty($existingUser))
        {
            throw new Exception("User already logged in");
        }

        $this->loggedUsers[] = $user;
    }

    public function getLoggedUsers(): array
    {
        return $this->loggedUsers;
    }

}