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
		'password' => md5(123456),
		'email' => $faker->unique()->email,
		'firstname' => $faker->firstname,
		'lastname' => $faker->lastname,
		'active' => rand(0, 1),
		'newsletter' => rand(0, 1),
	];
});

$factory->define(App\Recipe::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->name,
		'amount' => rand(0, 100),
		'desired_strength' => rand(0, 100),
		'pg' => rand(0, 100),
		'vg' => rand(0, 100),
		'nicotine_strength' => rand(0, 100),
		'nicotine_pg' => rand(0, 100),
		'nicotine_vg' => rand(0, 100),
		'wvpga' => rand(0, 100),
		'sleep_time' => rand(0, 25),
		'vape_ready' => rand(0, 1),
		'comment' => $faker->text,
	];
});
