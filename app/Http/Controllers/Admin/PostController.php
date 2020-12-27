<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\Tag;

use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')
                     ->where('user_id', auth()->user()->id)
                     ->paginate();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         * Trae todas las categorías ordenadas por nombre de forma ascendente
         * Devuelve un array asociativo donde id es la clave y name es el valor
        */
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');
        
        //Al concatenar métodos se debe usar get para obtener los resultados
        $tags = Tag::orderBy('name', 'asc')->get();

        //Enviar ambas colecciones a la vista
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        //Crear el nuevo post
        $post = Post::create($request->except('file'));

        //Comprobar si se subió una imágen
        if ($request->hasFile('file')) {
            //Rescatar el archivo con propiedades dinámicas (el nombre del campo)
            $file = $request->file;

            /**
             * Guardar la imágen en la carpeta public/image 
             * Guardar su ruta reliva: image/prueba.jpg
             */
            $path = Storage::disk('public')->put('image', $file);

            /**
             * Sobreescribir el campo file con la ruta de la imágen
             * Como se tiene una ruta relativa se usa el helper asset
             * El helper construye toda la ruta hasta la carpeta public
             * En la variable $path se almacenó la ruta relativa del archivo
             */
            $post->fill(['file' => asset($path)]);
            
            //Guardar el nuevo cambio
            $post->save();
        }

        //Relación con las etiquetas muchos a muchos
        $post->tags()->attach($request->tags);

        return redirect()->route('admin.posts.edit', $post->id)
                         ->with('info', 'Entrada creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //Comprobar si tiene autorización para editar este post
        $this->authorize('pass', $post);

        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'asc')->get();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, Post $post)
    {
        //Llena los campos con la nueva información y luego la guarda
        $post->fill($request->except('file'))->save();

        if ($request->hasFile('file')) {
            $path = Storage::disk('public')->put('image', $request->file);
            $post->fill(['file' => asset($path)])->save();
        }

        //Elimina todos los items que no estén en el array actual
        $post->tags()->sync($request->tags);

        return redirect()->route('admin.posts.edit', $post->id)
                         ->with('info', 'Entrada actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('info', 'Entrada ' . $post->name . ' eliminada exitosamente');
    }
}
