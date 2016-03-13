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
		'name'           => $faker->name,
		'email'          => $faker->safeEmail,
		'subscription'   => $faker->randomElement(['Platinum', 'Gold', 'Silver', 'Bronze' ]),
		'approved'       => $faker->randomElement(['1', '0']),
		'password'       => bcrypt('password'),
		'remember_token' => str_random(10),
    ];
});


$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
		'name'           => $faker->randomElement(['Food', 'Drink', 'Spirits']),
		'available'      => 1
    ];
});

$factory->define(App\Item::class, function (Faker\Generator $faker) {
    return [
		'name'           => $faker->name,
		'price'          => $faker->randomFloat(2, 50, 200),
		'qty'          	 => $faker->numberBetween(40, 194),
		'category_id'    => $faker->randomElement([1, 2, 3]),
		'available'      => $faker->randomElement(['1', '0'])
    ];
});











