<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        
        'name'=>$faker->city,
        'model'=>$faker-> bothify('G ##??'),
        'kW'=>$faker->numberBetween(50,250)
    ];
});
