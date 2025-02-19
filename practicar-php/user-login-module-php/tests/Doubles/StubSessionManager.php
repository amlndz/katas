<?php

namespace UserLoginService\Tests\Doubles;

use UserLoginService\Application\SessionManager;

class StubSessionManager implements SessionManager
{

    public function getSessions(): int
    {
        return 15;
    }

    public function login(string $userName, string $password): bool
    {
        // TODO: Implement login() method.
    }
}