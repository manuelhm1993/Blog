<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            //La clave de uno pasa a muchos, un usuario tiene muchos posts
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            //Por convención para referenciar un id se usa el nombre de la tabla en singular
            $table->foreignId('category_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->string('name');
            $table->string('slug')->unique();
            $table->mediumText('extract')->nullable();

            $table->text('body');

            //Tipos enumerados y valores por defecto
            $table->enum('status', ['PUBLISHED', 'DRAFT'])->default('DRAFT');

            //Campo para guardar las imágenes
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
