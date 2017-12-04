<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function author()
	{
	      return $this->belongsTo(User::class);
	}

	public function category()
	{
	      return $this->belongsTo(Category::class);
	}
	public static function findBySlug($slug)
	{
		return static::where('slug', $slug)->first();
	}

	 
	
}
