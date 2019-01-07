<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostsTag extends Model
{
    //posts and tags relationship
    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag', null, 'idtags', 'tags_idtags');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Model\Post', null, 'idposts', 'posts_idposts');
    }
}
