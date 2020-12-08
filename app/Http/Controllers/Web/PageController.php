<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\Category;

class PageController extends Controller
{
    public function blog() {
        //Todos los posts publicados en orden descendente paginados de 3 en 3
        $posts = Post::orderBy('id', 'desc')
                     ->where('status', 'PUBLISHED')
                     ->paginate(3);

        return view('web.blog', compact('posts'));
    }

    public function post(Post $post) {
        return view('web.post', compact('post'));
    }

    public function category(Category $category) {
        /**
         * Cuando se utilizan métodos encadenados se debe culminar con get
         * Se realizaron dos planteamientos para esta consulta usando 
         * Eloquent relationships y otro sin él
         */
        /*
        $posts = $category->posts()
                          ->where('status', 'PUBLISHED')
                          ->orderBy('id', 'desc')
                          ->get();
        
        $posts = Post::where('status', 'PUBLISHED')
                     ->where('category_id', $category->id)
                     ->orderBy('id', 'desc')
                     ->get();
        */

        $posts = $category->posts()
                          ->where('status', 'PUBLISHED')
                          ->orderBy('id', 'desc')
                          ->paginate(3);

        return view('web.blog', compact('posts'));
    }
}
