<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable = ['is_active','comment_id','author','email','photo','body','post_id'];

    public function post(){
    	return $this->belongsTo('App\Post');
    }

    public function reply(){
    	return $this->hasMany('App\Reply');
    }

}
