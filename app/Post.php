<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /*********** Campos de clase ***********/
    protected $fillable = [
        'user_id', 'category_id', 'name',
        'slug', 'excerpt', 'body',
        'status', 'file',
    ];

    /*********** Relación uno a muchos inversa ***********/
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /*********** Relación muchos a muchos ***********/
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
