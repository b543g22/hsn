<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Song;
use Faker\Generator as Faker;

$factory->define(Song::class, function (Faker $faker) {
    return [
        'song_title' => $faker->word,
        'lyrics' => $faker->text,
        'artist_id' => 5
    ];
});
