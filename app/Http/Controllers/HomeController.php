<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Post;
use App\PostCatRel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $posts = Post::all();
        return view('/home', array('posts'=> $posts));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        $posts = Post::simplePaginate();
        return view('home', [ 'posts' => $posts ] );
    }*/
   
    public function show($slug)
    {
        $posts = Post::findBySlug($slug);
        return view('post', ['posts'=> $posts]);
    }
}
