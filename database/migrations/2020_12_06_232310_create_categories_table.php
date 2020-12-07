<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            /**
             * Slug significa babosa, se caracteriza por dejar su rastro al moverse
             * El término le queda perfecto ya que permite crear URLs Friendly
             * Si no se usan los slugs al ver un post la url queda: http://mhenriquez/post/1
             * Para hacer SEO la url debe referenciar el contenido: http://mhenriquez/post/desarrollo-web
             * Esto es un slug
             */
            $table->string('slug')->unique();
            $table->mediumText('body')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
