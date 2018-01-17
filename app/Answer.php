<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
	public $timestamps = false;
	protected $table = "post_answers";

    public function author(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function votes(){
        return $this->hasMany('App\Vote');
    }
    public function user_votes(){
        return $this->hasMany('App\Vote')->where('user_id',Auth::user()->id);
    }
    function save_answers($data){
    	unset($data['_token']);
    	$obj = new Answer;
    	$obj->post_id = $data['post_id'];
    	$obj->user_id = Auth::user()->id;
    	$obj->answer = $data['answer'];
    	$obj->status = 1;
    	$obj->created_at = date('Y-m-d H:i:s');
    	$obj->updated_at = date('Y-m-d H:i:s');
    	$obj->save();
    	return 1;
    }
}
