<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Job;
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

$factory->define(Job::class, function (Faker $faker) {

    $recruiters = User::recruiters();
    $recruiter = $faker->randomElement($recruiters);
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'recruiter_id' => $recruiter->id,
        'job_type' => $faker->randomElement(['permanent', 'temporary', 'contract', 'internship']),
        'duration' => $faker->randomElement(['l6m','m6m','p']),
        'company_id' => $recruiter->company->id
    ];
});
