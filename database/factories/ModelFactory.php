<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence(),
    ];
});

$factory->define(App\Topic::class, function (Faker $faker) {
    return [
        'category_id' => null,
    	'user_id' => 1,
        'title' => $faker->sentence(),
        'body' => $faker->paragraph(7),
        'views' => $faker->numberBetween(0, 10000),
        'created_at' => $faker->datetimeBetween('-5 months'),
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'topic_id' => 1,
        'user_id' => 1,
        'body' => $faker->sentence(),
    ];
});