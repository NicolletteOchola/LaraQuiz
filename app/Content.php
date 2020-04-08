<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $primaryKey = 'content_id';

    public function tag() {
        return $this->hasOne('App\Tag', 'tag');
    }
}
