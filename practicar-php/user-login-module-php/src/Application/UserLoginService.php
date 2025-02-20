<?php

namespace UserLoginService\Application;

use Exception;
use UserLoginService\Domain\User;

class UserLoginService
{
    private SessionManager $sessionManager;

    public function __construct(SessionManager $sessionManager)
    {
        $this->sessionManager = $sessionManager;
    }

    /**
     * var User[]
     */
    private array $loggedUsers = [];

    /**
     * @throws Exception
     */
    public function manualLogin(User $user): void
    {
        $existsUser = in_array($user, $this->loggedUsers);

        if(!$existsUser)
        {
            throw new Exception("User already logged in");
        }

        $this->loggedUsers[] = $user;
    }

    public function getLoggedUsers(): array
    {
        return $this->loggedUsers;
    }

    public function countExternalLoginSessions(): int
    {
        return $this->sessionManager->getSessions();
    }

    public function login(String $username, String $password): string
    {
        if(!$this->sessionManager->login($username, $password))
        {
           return 'Login incorrecto';
        }

        $this->loggedUsers[] = new User($username);
        return 'Login correcto';
    }

    public function logout(User $user): string
    {
        $existingUser = array_filter($this->loggedUsers, fn ($loggedUser) => $loggedUser->userName() === $user->userName());

        if(!$existingUser)
        {
            return "User not found";
        }
        if(!$this->sessionManager->logout($user->userName()))
        {
            return "Logout incorrecto";
        }


        return 'ok';
    }
}
