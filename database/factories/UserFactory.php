<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\User;
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

$factory->define(User::class, function (Faker $faker) {

    $user_type = $faker->randomElement(['recruiter', 'candidate']);

    if ($user_type === 'recruiter') {
        $company_id = $faker->randomElement(Company::all()->pluck('id'));
    } else {
        $company_id = -1;
    }
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'secret', // password
        'remember_token' => Str::random(10),
        'user_type' => $user_type,
        'company_id' => $company_id
    ];
});
