<?php


namespace App\Tests\Traits;


use App\Tests\TestCase;
use App\Traits\FirstNameTrait;

class FirstNameTraitTest extends TestCase
{

    /**@var FirstNameTrait */
    private $trait;

    public function setUp(): void
    {
        $this->trait = $this->getMockBuilder(FirstNameTrait::class)
            ->getMockForTrait();
    }

    public function testGetMethodIsNull()
    {
        self::assertNull($this->trait->getFirstname());
    }

    public function testGetMethodIsString()
    {
        $this->trait->setFirstname($this->faker->name);

        self::assertIsString($this->trait->getFirstname());
    }

    public function testSetMethodException () {
        $this->expectExceptionMessage('Firstname must be string');

        $this->trait->setFirstname($this->faker->randomDigit);
    }

}
