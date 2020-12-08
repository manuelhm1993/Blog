<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//De la raíz redireccionar al blog
Route::redirect('/', '/posts');

Auth::routes();

Route::prefix('/posts')->name('web.')->group(function () {
    //El controlador se colocará en una carpeta
    Route::get('/', 'Web\PostController@index')->name('posts.index');

    //Implicit binding con campo personalizado
    Route::get('/{post:slug}', 'Web\PostController@show')->name('posts.show');
});
