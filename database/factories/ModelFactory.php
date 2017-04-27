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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\CitationStyle::class, function (Faker\Generator $faker) {

    return [
        'user_id' => $faker->numberBetween(1, 2),
        'name' => $faker->word
    ];
});

$factory->define(App\ResourceType::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'style_template' => $faker->sentence
    ];
});

$factory->define(App\ResourceComponent::class, function (Faker\Generator $faker) {

    return [
        'resource_type_id' => $faker->numberBetween(1, 10),
        'name' => $faker->word,
        'data_type' => "text"
    ];
});
