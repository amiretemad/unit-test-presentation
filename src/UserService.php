<?php


namespace App;


use App\Repository\UserRepository;
use App\Schema\UserSchema;

class UserService
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->userRepository = $repository;
    }

    /**
     * @return array
     */
    public function getAllUsers(): array
    {
        return $this->userRepository->getUsers();
    }

    /**
     * @return array
     */
    public function getActiveUsers(): array
    {
        return array_filter($this->userRepository->getUsers(), static function (UserSchema $userSchema) {
            return $userSchema->getStatus() === 1;
        });
    }

}
