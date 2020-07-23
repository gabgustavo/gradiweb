<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\TipoDocumento::class, function (Faker $faker) {
    return [
        'tipo_documento' => 'C.C'
    ];
});
