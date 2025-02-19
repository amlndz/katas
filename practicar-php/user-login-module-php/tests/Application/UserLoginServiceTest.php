<?php

declare(strict_types=1);

namespace UserLoginService\Tests\Application;

use PHPUnit\Framework\TestCase;
use UserLoginService\Application\UserLoginService;
use UserLoginService\Domain\User;
use UserLoginService\Tests\Doubles\DummySessionManager;
use UserLoginService\Tests\Doubles\FakeSessionManager;
use UserLoginService\Tests\Doubles\StubSessionManager;

final class UserLoginServiceTest extends TestCase
{
    /**
     * @test
     */
    public function userIsLoggedInManually(): void
    {
        $user = new User('John Doe');
        $userLoginService = new UserLoginService(new DummySessionManager());
        
        $userLoginService->manualLogin($user);
        $loggedUsers = $userLoginService->getLoggedUsers();

        $this->assertCount(1, $loggedUsers);
        $this->assertEquals('John Doe', $loggedUsers[0]->username());
    }

    /**
     * @test
     */
    public function noUsersLoggedInManually(): void
    {
        $userLoginService = new UserLoginService(new DummySessionManager());

        $this->assertEmpty($userLoginService->getLoggedUsers());
    }

    /**
     * @test
     */
    public function userAlreadyLoggedInManually(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('User already logged in');

        $user = new User('John Doe');
        $userLoginService = new UserLoginService(new DummySessionManager());
        $userLoginService->manualLogin($user);
        $userLoginService->manualLogin($user);
        $loggedUsers = $userLoginService->getLoggedUsers();

        $this->assertEquals('John Doe', $loggedUsers[0]->username());
    }

    /**
     * @test
     */
    public function countActiveExternalSessions(): void
    {
        $userLoginService = new UserLoginService(new StubSessionManager());

        $externalSessions = $userLoginService->countExternalLoginSessions();

        $this->assertEquals(15, $externalSessions);
    }

    /**
     * @test
     */
    public function loginWithValidCredentials(): void
    {
        $userLoginService = new UserLoginService(new FakeSessionManager());

        $result = $userLoginService->login('johnDoe', 'iamjohndoe');
        $loggedUsers = $userLoginService->getLoggedUsers();

        $this->assertCount(1, $loggedUsers);
        $this->assertEquals('Login correcto', $result);
    }

    /**
     * @test
     */
    public function loginWithInvalidCredentials(): void
    {
        $userLoginService = new UserLoginService(new FakeSessionManager());

        $result = $userLoginService->login('johnDoe', 'wrongpassword');
        $loggedUsers = $userLoginService->getLoggedUsers();

        $this->assertCount(0, $loggedUsers);
        $this->assertEquals('Login incorrecto', $result);
    }
}
