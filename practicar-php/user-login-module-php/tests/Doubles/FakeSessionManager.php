<?php

namespace UserLoginService\Tests\Doubles;

use UserLoginService\Application\SessionManager;

class FakeSessionManager implements SessionManager
{

    public function getSessions(): int
    {
    }

    public function login(string $userName, string $password): bool
    {
        return $userName == 'johnDoe' && $password == 'iamjohndoe';
    }
}