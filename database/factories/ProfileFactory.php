<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\Profile;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        //
    	'user_id' => $faker->randomDigit,
        'title' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'description' => $faker->text($maxNbChars = 200),
        'url' => $faker->url,
    ];
});
