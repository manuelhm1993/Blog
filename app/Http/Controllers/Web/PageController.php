<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;

class PageController extends Controller
{
    public function blog() {
        //Todos los posts publicados en orden descendente paginados de 3 en 3
        $posts = Post::orderBy('id', 'desc')
                     ->where('status', 'PUBLISHED')
                     ->paginate(3);

        return view('web.posts', compact('posts'));
    }
}
