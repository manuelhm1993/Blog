<?php

namespace App\Policies;

use App\User;
use App\Post;

use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //El usuario se pasa por defecto
    public function pass(User $user, Post $post)
    {
        //Valida que el post sea del usuario actual
        return $user->id == $post->user_id;
    }
}
