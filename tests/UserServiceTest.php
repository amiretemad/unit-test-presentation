<?php


namespace App\Tests;


use App\Repository\UserRepository;
use App\Schema\UserSchema;
use App\UserService;
use Exception;
use phpDocumentor\Reflection\Types\Parent_;

/**
 * Class UserServiceTest
 * @package App\Tests
 * @coversDefaultClass \App\UserService
 */
class UserServiceTest extends TestCase
{

    /** @var UserRepository */
    private $userRepository;
    /**@var UserService */
    private $userService;

    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository = $this->createMock(UserRepository::class);

        $this->userService = new UserService($this->userRepository);
    }

    /**
     * @throws Exception
     * @covers ::getAllUsers
     */
    public function testGetAllUsers()
    {
        $users =[
            (new UserSchema())->setFirstname($this->faker->name)->setLastname($this->faker->lastName),
            (new UserSchema())->setFirstname($this->faker->name)->setLastname($this->faker->lastName)
        ];

        $this->userRepository
            ->method('getUsers')
            ->willReturn($users);

        $expected = $this->userService->getAllUsers();

        $this->assertEquals($users, $expected);

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
