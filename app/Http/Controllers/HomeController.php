<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\PostCatRel;
use DB;
use View;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(){
        $this->middleware('auth');
        // calculate result for showing in right sidebar
        View::share('sidebarTotalQuestions', POST::where('posts.status','PUBLISHED')->count());
        View::share('sidebarTotalUsers', User::count());
        View::share('topQuestions', POST::where('posts.status','PUBLISHED')->limit(5)->get());
    }

    public function index($userId='') {
        // find questions to be shown on home page
        $userCondition = '';
        if(!empty($userId)){
            $userId = Crypt::decryptString($userId);
            //  questions posted by particular users
            $posts = POST::with('category')->with('author')->with('answers')->with('views')->where('posts.status','PUBLISHED')->where('posts.author_id',$userId)->paginate(5);
        }
        else{
            // all questions
            $posts = POST::with('category')->with('author')->with('answers')->with('views')->where('posts.status','PUBLISHED')->paginate(5);
        }
        /*$posts = json_decode(json_encode($posts), true);
        echo "<pre>"; print_r($posts);die;*/
        return view('/home', array('posts'=> $posts));
    }
   
    public function show($slug){
        $posts = Post::findBySlug($slug);
        if(!empty($posts)){
            Post::saveViews($posts->id);
        }
        return view('post', ['posts'=> $posts]);
    }
    public function profile_rating(Request $request){
        $data = $request->all();
        $obj = new User;
        return $obj->saveRating($data);
    }
}