<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

use Illuminate\Support\Str;//Se debe importar la clase Str para usar el método slug

$factory->define(Category::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    
    //$slug = Str::slug($title, '-');//Categoría Alimentos -> categoria-alimentos
    
    $slug = Str::of($title)->slug('-');//Sintaxis alternativa

    return [
        'name' => $title,
        'slug' => $slug,
        'body' => $faker->text(500),
    ];
});
