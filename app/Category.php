<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /*********** Campos de clase ***********/
    protected $fillable = [
        'name', 'slug', 'body',
    ];

    /*********** Relación uno a muchos ***********/
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
