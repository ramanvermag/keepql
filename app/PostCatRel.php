<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PostCatRel extends Model
{
    protected $table = "post_cat_rel";
    public $timestamps = false;
    public function category()
	{  
	      return $this->belongsTo(Category::class,"cat_id","id");
	} 

}
