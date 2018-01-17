<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Image;
use Validator;
use App\Vote;
use App\Answer;
use App\User;
use App\Category;
use App\Post;
use Auth;
use Session;

class PostsController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index() {
        //
    }
    public function saveAnswers(Request $request){
        $request->validate([
            'answer' => 'required'
        ]);
        $obj = new Answer;
        $result = $obj->save_answers($request->all());
        return Redirect::back()->with('status', 'Answer submitted successfully.');
    }
    public function saveVotes(Request $request){
        $data = $request->all();
        $obj = new Vote;
        $obj->save_votes($data);
        $getResult = $obj->getVotesByAnswer($data['answer_id']);
        echo $getResult;die;
    }
    public function ask_a_question(Request $request){
        $allCategories = Category::all();
        return view('ask_a_question',array('allCategories'=>$allCategories)); 
    }
    public function saveQuestion(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts',
            'slug'=>'required',
            'body' => 'required',
            'category_id'=>'required',
            'status'=>'required',
            'tags'=>'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);
        if ($validator->fails()) {
            return redirect('ask-a-question')
                ->withErrors($validator)->withInput();
        }
        else{
            $data = $request->all();
            $postData = new Post;
            unset($data['_token']);
            $postData->image = '';
            foreach($data as $key=>$post){
                if(!empty($post)){
                    $postData->$key = $post;
                }
            }
            if( $request->hasFile('image') ){
                $avatar = $request->file('image');
                if(!empty($avatar)){
                    $filename = time() . '.'. $avatar->getClientOriginalExtension();
                    //echo $filename;die;
                    $path = public_path('../storage/app/public/posts/January2018/'. $filename) ;
                   /* Image::make($avatar)->resize(300,300)->save( $path );*/
                    Image::make($avatar)->save( $path );
                    $postData->image = 'posts/January2018/'. $filename;
                }
            }
            $postData->author_id = Auth::user()->id;
            $postData->save();
            $allCategories = Category::all();
            Session::flash('success', 'Question saved successfully'); 
            return redirect('ask-a-question')->with(compact('allCategories'));
        }
    }
    public function view_user_profile(Request $request,$userId){
        $userData = User::where('id',$userId)->with('posts')->get();
        $userData = json_decode(json_encode($userData), true);
        //echo "<pre>"; print_r($userData);die;
        if(empty($userData)){
            return redirect('/home');
        }
        $answersCount = Answer::where('user_id',$userId)->count();
        $postViews = DB::table('views')
                    ->leftJoin('posts', 'views.post_id', '=', 'posts.id') 
                    ->where('posts.author_id', '=', $userId)
                    ->count();
        $ratings = DB::table('ratings')
                        ->selectRaw('round(avg(rating)) as sum')
                        ->where('profile_rated','=',$userId)
                        ->groupBy('profile_rated')
                        ->get();
        return view('view_user_profile')->with(compact('userData','answersCount','postViews','ratings'));
    }
    public function view_user_answers(Request $request,$userId=''){
        return redirect('/home');
        /*$results = DB::select('select posts.*,p_a.answer from posts left join post_answers p_a on p_a.post_id=posts.id where posts.id IN(select post_id from post_answers where user_id ='.$userId.' ) And p_a.user_id ='.$userId);
        $posts = json_decode(json_encode($results), true);
        echo "<pre>"; print_r($posts);die;*/
    }
}