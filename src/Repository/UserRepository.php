<?php


namespace App\Repository;


use App\Schema\UserSchema;

class UserRepository
{

    public function getUsers(): array
    {
        /**
         * For example fetching data from db
         */
        return [
            (new UserSchema())->setFirstname('Amir')->setLastname('Etemad'),
            (new UserSchema())->setFirstname('Onur')->setLastname('Kaya'),
        ];
    }

}