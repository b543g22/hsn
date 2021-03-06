<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Artist;
use Faker\Generator as Faker;

$factory->define(Artist::class, function (Faker $faker) {
    return [
        'artist_name' => $faker->name,
        'artist_image' => $faker->url,
        'updkbn' => 'A'
    ];
});
