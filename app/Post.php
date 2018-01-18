<?php

namespace App;
use App\View;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Post extends Model{
    //
    public function author(){
	    return $this->belongsTo(User::class);
	}
	public function category(){
	    //return $this->hasMany(PostCatRel::class)->with("category");
	    return $this->hasMany('App\Category','id','category_id');
	}
	public static function findBySlug($slug){
		return static::with('category')->with('answers')->where('slug', $slug)->first();
	}
	public function answers(){
	    return $this->hasMany('App\Answer')->with('author')->with('votes')->with('user_votes');
	}
	public function views(){
	    return $this->hasMany('App\Views');
	}
	public static function saveViews($postId=''){
		if(!empty($postId)) {
			$user_id = Auth::user()->id;
			$view = Views::where('post_id',$postId)
    				->where('user_id',$user_id)->first();
    		if(empty($view)){
	    		$viewsData = new Views;
	    		$viewsData->post_id = $postId;
	    		$viewsData->user_id = $user_id;
	    		$viewsData->save();
	    	}
		}
	}
}
?>