<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //relationships
    public function author(){
        return $this->belongsTo('App\Model\Author', 'authors_idauthors');
    }

    public function tags()
    {
        return $this->hasMany('App\Model\PostsTag', 'posts_idposts', 'idposts');
    }
}
