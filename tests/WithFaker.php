<?php


namespace App\Tests;


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
