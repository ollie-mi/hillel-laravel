<?php

/** @var Factory $factory */

use App\Models\Order;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Order::class, static function (Faker $faker) {

    $date = $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null);

    return [
        'user_id' => static function() {
            return User::inRandomOrder()->get()->first()->id;
        },
        'order_price' => $faker->randomFloat(2, 10, 200),
        'created_at' => $date,
        'updated_at' => $date
    ];
});
