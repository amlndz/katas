<?php

declare(strict_types=1);

namespace UserLoginService\Tests\Application;

use PHPUnit\Framework\TestCase;
use UserLoginService\Application\UserLoginService;
use UserLoginService\Domain\User;

final class UserLoginServiceTest extends TestCase
{
    /**
     * @test
     */
    public function userIsLoggedInManually()
    {
        $user = new User('John Doe');
        $userLoginService = new UserLoginService();
        
        $userLoginService->manualLogin($user);
        $loggedUsers = $userLoginService->getLoggedUsers();

        $this->assertCount(1, $loggedUsers);
        $this->assertEquals('John Doe', $loggedUsers[0]->username());
    }


}
