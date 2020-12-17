<?php


namespace App\Tests;


use App\Tests\Traits\WithFaker;

/**
 * Class TestCase
 * @package App\Tests
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker();
    }

}
