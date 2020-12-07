<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    
    //$slug = Str::of($title)->slug('-');//Categoría Alimentos -> categoria-alimentos

    $slug = Str::slug($title, '-');//Sintaxis alternativa

    return [
        'user_id'     => rand(1, 30),//Genera Ids aleatorios según los usuarios que se crearán
        'category_id' => rand(1, 20),
        'name'        => $title,
        'slug'        => $slug,
        'excerpt'     => $faker->text(200),
        'body'        => $faker->text(500),
        'status'      => $faker->randomElement(['PUBLISHED', 'DRAFT']),//Devuelve un elemento al azar del array dado
        'file'        => $faker->imageUrl(1200, 400),
    ];
});
