<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
      'nombres' => $faker->name,
      'email' => $faker->unique()->safeEmail,
      'tipo_documento_id' => 1,
      'documento' => $faker->numberBetween(1111111,999999999),
      'telefono' => $faker->numberBetween(1111111,999999999),
    ];
});
