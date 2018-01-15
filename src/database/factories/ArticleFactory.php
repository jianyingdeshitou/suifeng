<?php

use Faker\Generator as Faker;

use App\User;

$factory->define(App\Article::class, function (Faker $faker) {
	$user_ids = User::pluck('id')->toArray();
    return [
        'title' => $faker->sentence(mt_rand(3, 10)),
        'content' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
        'user_id' => $faker->randomElement($user_ids),
        'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
    ];
});
