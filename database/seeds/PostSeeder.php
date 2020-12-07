<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 300)->create()->each(function ($post) {
            //Relacionar cada post con tres etiquetas de forma aleatoria
            $post->tags()->attach([
                rand(1, 5),
                rand(6, 14),
                rand(15, 20),
            ]);
        });
    }
}
