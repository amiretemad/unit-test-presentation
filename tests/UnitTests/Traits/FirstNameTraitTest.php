<?php


namespace App\Tests\UnitTests\Traits;

use App\Tests\TestCase;
use App\Traits\FirstNameTrait;
use RuntimeException;

/**
 * Class FirstNameTraitTest
 * @package App\Tests\UnitTests\Traits
 */
class FirstNameTraitTest extends TestCase
{

    /**@var FirstNameTrait */
    private $trait;

    public function setUp(): void
    {
        parent::setUp();

        $this->trait = $this->getMockBuilder(FirstNameTrait::class)
            ->getMockForTrait();
    }

    public function testGetMethodIsNull(): void
    {
        self::assertNull($this->trait->getFirstname());
    }

    public function testGetMethodIsString(): void
    {
        $this->trait->setFirstname($this->faker->name);

        self::assertIsString($this->trait->getFirstname());
    }

    public function testSetMethodException(): void
    {
        $this->expectExceptionMessage('Firstname must be string');
        $this->expectException(RuntimeException::class);

        $this->trait->setFirstname($this->faker->randomDigit);
    }

}
