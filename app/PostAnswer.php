<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostAnswer extends Model{
    public function posts(){
    	return $this->belongsTo('App\Post','post_id','id')->with('category')->with('author');
    }
    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }
}
