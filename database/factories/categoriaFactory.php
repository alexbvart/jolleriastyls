<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\categoria;
use Faker\Generator as Faker;

$factory->define(categoria::class, function (Faker $faker) {
    return [
        'descripcion'=>$faker->name,
        'estado'=>'1',
    ];
});
