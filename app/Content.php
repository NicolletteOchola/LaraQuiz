<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function tag() {
        return $this->hasMany('App\Tag', 'tag');
    }
}