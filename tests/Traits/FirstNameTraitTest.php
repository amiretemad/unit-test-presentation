<?php


namespace App\Tests\Traits;


use App\Traits\FirstNameTrait;
use PHPUnit\Framework\TestCase;

class FirstNameTraitTest extends TestCase
{

    /**
     * @var FirstNameTrait
     */
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
        $this->trait->setFirstname('Amir');

        self::assertIsString($this->trait->getFirstname());
    }

    public function testSetMethodException () {
        $this->expectExceptionMessage('Firstname must be string');

        $this->trait->setFirstname('123123');
    }

}