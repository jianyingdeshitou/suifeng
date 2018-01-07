<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
	$user_ids = User::pluck('id')->toArray();
    return [
        'title' => $faker->sentence(),
        'content' => $faker->text(),
        'user_id' => $faker->randomElement($user_ids),
    ];
});
