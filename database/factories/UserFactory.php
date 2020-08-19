<?php

/** @var Factory $factory */

use App\Models\User;
use App\Models\UserProfile;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
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

$factory->define(User::class, static function (Faker $faker) {
    $createdDate = $faker->dateTimeBetween($startDate = '-5 years', $endDate = '-1 months', $timezone = null);
    $updatedDate = $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null);

    if ($updatedDate < $createdDate) {
        $updatedDate = Carbon::now();
    }

    return [
        'login' => $faker->userName,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'email' => $faker->unique()->safeEmail,
        'status' => $faker->randomElement(['ON', 'OFF']),
        'created_at' => $createdDate,
        'updated_at' => $updatedDate
    ];
});

$factory->define(UserProfile::class, static function (Faker $faker) {

    $gender = $faker->randomElement(['male', 'female']);

    return [
        'first_name' => $faker->firstName($gender),
        'last_name' => $faker->lastName,
        'phone' => $faker->numerify('############'),
        'birthday' => $faker->dateTimeBetween($startDate = '-70 years', $endDate = '-16 years', $timezone = null)
    ];
});
