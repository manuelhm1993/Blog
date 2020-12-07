<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /*********** Campos de clase ***********/
    protected $fillable = [
        'name', 'slug',
    ];

    /*********** Relación uno a muchos ***********/
    public function posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
}
