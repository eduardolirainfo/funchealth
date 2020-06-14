<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Conta;
use Tests\TestCase;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Conta::class, function () {
    return [
        'conta' => rand(50000,54321)
        ];
});
