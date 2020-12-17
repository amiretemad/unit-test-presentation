<?php


namespace App\Tests\UnitTests;

use App\Tests\TestCase;
use App\Utils;

/**
 * Class DataProviderTest
 * @package App\Tests\UnitTests
 * @coversDefaultClass \App\Utils
 */
class DataProviderTest extends TestCase
{

    /**
     * @covers  ::tcValidation
     * @dataProvider  getIdNumbers
     *
     *
     * @param string $identityNumber
     */
    public function testTcValidationReturnsTrue (string $identityNumber): void
    {
        self::assertTrue(Utils::tcValidation($identityNumber));
    }

    /**
     * @return \int[][]
     */
    public function getIdNumbers(): array
    {
        return [
            ['84153318250'],
            ['28714416160'],
            ['14014964920']
        ];
    }

}