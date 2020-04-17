<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $primaryKey = 'content_id';

    // fields that can be filled
    protected $fillable = ['content_name', 'content'];

    // 'title' => 'required|unique:posts,title,'.$this->id.'|max:255';

    public function getRouteKeyName()
    {
        // return 'content_id';
        return $this->primaryKey;
    }
    
    public function tag() {
        return $this->hasOne('App\Tag', 'tag');
    }
}
