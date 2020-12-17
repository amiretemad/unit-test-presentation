<?php


namespace App\Tests\Traits;


use Faker\Factory;
use Faker\Generator;

trait WithFaker
{
    /** @var Generator */
    protected $faker;

    public function faker()
    {
        $this->faker = Factory::create();
    }
}
