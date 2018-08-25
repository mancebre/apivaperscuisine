<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->username,
        'password' => $faker->password,
        'email' => $faker->email,
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'active' => rand(0, 1),
        'newsletter' => rand(0, 1),
    ];
});
