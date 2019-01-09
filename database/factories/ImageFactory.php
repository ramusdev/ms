<?php

use Faker\Generator as Faker;
use App\Image;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50),
        'path' => 'https://via.placeholder.com/50x50'
    ];
});
