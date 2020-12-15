<?php


namespace App\Tests;


use App\Repository\UserRepository;
use App\Schema\UserSchema;
use App\UserService;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var UserService
     */
    private $userService;

    public function setUp(): void
    {
        $this->userRepository = $this->createMock(UserRepository::class);

        $this->userService = new UserService($this->userRepository);
    }

    public function testGetAllUsers()
    {

        $this->userRepository
            ->method('getUsers')
            ->willReturn([
                (new UserSchema())->setFirstname('Amir')->setLastname('Etemad'),
            ]);

        self::assertCount(1, $this->userService->getAllUsers());

    }

    public function testGetActiveUsers()
    {
        $this->userRepository
            ->method('getUsers')
            ->willReturn([
                (new UserSchema())->setFirstname('Amir')->setLastname('Etemad')->setStatus(0),
                (new UserSchema())->setFirstname('Amir')->setLastname('Etemad')->setStatus(1),

            ]);

        self::assertCount(1, $this->userService->getActiveUsers());

    }

}