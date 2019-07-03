<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Professor::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'data_nascimento' => $faker->date,
    ];
});
