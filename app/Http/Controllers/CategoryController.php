<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostCatRel;

class CategoryController extends Controller
{
     public function index(){

    	$postCatRel = PostCatRel::all();
    	return view('home', compact('postCatRel'));

    }
}
