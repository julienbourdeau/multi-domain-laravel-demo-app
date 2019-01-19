<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
