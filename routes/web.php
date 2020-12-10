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
Route::redirect('/', '/blog');

//Auth::routes(['register' => false]);//Desactivar el enlace de registro
Auth::routes();

//Usuarios
Route::name('web.')->group(function () {
    //El controlador se colocará en una carpeta
    Route::get('/blog', 'Web\PageController@blog')->name('blog');

    //Implicit binding con campo personalizado
    Route::get('/post/{post:slug}', 'Web\PageController@post')->name('post');
    Route::get('/categorias/{category:slug}', 'Web\PageController@category')->name('category');
    Route::get('/etiquetas/{tag:slug}', 'Web\PageController@tag')->name('tag');
});

//Administradores - Todas las rutas necesitan login y tienen admin. como prefijo de nombre
Route::middleware(['auth'])->name('admin.')->group(function () {
    /**
     * Como cada sección tendrá su CRUD se usan controladores de recursos
     * Se pueden registrar muchos de esta forma
     */
    Route::resources([
        'categories' => 'Admin\CategoryController',
        'tags'       => 'Admin\TagController',
        'posts'      => 'Admin\PostController',
    ]);
});