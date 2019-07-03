<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Curso::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
         'professor_id' => function () {
            return factory(App\Models\Professor::class)->create()->id;
        }
    ];
});
