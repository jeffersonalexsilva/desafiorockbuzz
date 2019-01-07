<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        return $this->hasMAny('App\Model\PostsTag', 'tags_idtags','idtags');
    }
}
