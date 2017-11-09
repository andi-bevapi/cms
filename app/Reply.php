<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //

    protected $fillable = ['is_active','comment_id','author','email','photo','body'];

    
    public function comment(){
    	return $this->belongsTo('App\Comment');
    }

}
