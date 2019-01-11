<?php

use Faker\Generator as Faker;
use App\Image;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'type' => 'thumbnail',
        'name' => '1547197114_nature.jpg',
        'path' => 'thumbnails/1547197114_nature.jpg',
    ];
});
