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

use financeiro\Models\Bank;
use financeiro\Models\User;

$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->state(User::class, 'admin', function (Faker\Generator $faker){
    return [
        'role' => User::ROLE_ADMIN
    ];
});

/*$factory->define(Bank::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'logo' => md5(time()). '.jpeg',
    ];
});*/

$factory->define(BankAccount::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->city,
        'agency' => rand(10000, 60000).'-'.rand(0,9),
        'account' => rand(70000, 260000).'-'.rand(0,9)
    ];
});
