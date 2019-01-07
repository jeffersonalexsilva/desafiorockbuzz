<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
   //relationship posts
    public function posts(){
        return $this->hasMany('App\Model\Post','authors_idauthors','idauthors');
    }
}
