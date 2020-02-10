<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Color;
use App\Models\Product;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $randomNumber = rand(1, 1000);

    return [
        'name' => $faker->text(40),
        'price' => $faker->randomElement(range(1990, 100990, 500)),
        'color_id' => Color::query()->inRandomOrder()->value('id'),
        'size' => $faker->randomElement(range(32, 52, 2)),
        'image' => "https://i.picsum.photos/id/{$randomNumber}/300/500.jpg",
        'user_id' => User::query()->inRandomOrder()->value('id'),
    ];
});
