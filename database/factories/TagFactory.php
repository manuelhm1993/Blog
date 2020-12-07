<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

use Illuminate\Support\Str;

$factory->define(Tag::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    $slug = Str::of($title)->slug('-');

    return [
        'name' => $title,
        'slug' => $slug,
    ];
});
