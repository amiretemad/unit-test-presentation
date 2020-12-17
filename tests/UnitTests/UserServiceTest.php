<?php


namespace App\Tests\UnitTests;


use App\Repository\UserRepository;
use App\Schema\UserSchema;
use App\Tests\TestCase;
use App\UserService;
use Exception;

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
    public function testGetAllUsers(): void
    {

        $users = [
            (new UserSchema())->setFirstname($this->faker->name)->setLastname($this->faker->lastName),
            (new UserSchema())->setFirstname($this->faker->name)->setLastname($this->faker->lastName)
        ];

        $this->userRepository
            ->method('getUsers')
            ->willReturn($users);

        $expected = $this->userService->getAllUsers();

        self::assertEquals($users, $expected);

    }

    /**
     * @throws Exception
     * @covers ::getActiveUsers
     */
    public function testGetActiveUsers(): void
    {

        $deactivateUsers = [(new UserSchema())->setFirstname($this->faker->firstName)->setLastname($this->faker->lastName)->setStatus(0)];

        $activeUser = [
            (new UserSchema())->setFirstname($this->faker->firstName)->setLastname($this->faker->lastName)->setStatus(1),
            (new UserSchema())->setFirstname($this->faker->firstName)->setLastname($this->faker->lastName)->setStatus(1)
        ];

        $this->userRepository
            ->method('getUsers')
            ->willReturn( array_merge($deactivateUsers,$activeUser));

        self::assertCount(count($activeUser), $this->userService->getActiveUsers());

    }

}
