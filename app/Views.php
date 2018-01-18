<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Views extends Model
{
    //
    public $timestamps = false;
    protected $table = 'views';
    public function posts(){
    	return $this->belongsTo('App\Post','post_id','id');
    }
}