<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use DB;
use Image;
use Validator;
use App\Vote;
use App\Answer;
use App\User;
use App\Category;
use App\Post;
use App\Views;
use App\PostAnswer;
use Auth;
use Session;
use View;

class PostsController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
        View::share('sidebarTotalQuestions', POST::where('posts.status','PUBLISHED')->count());
        View::share('sidebarTotalUsers', User::count());
        View::share('topQuestions', POST::where('posts.status','PUBLISHED')->limit(5)->get());
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
    public function ask_a_question(Request $request,$id=''){
        $allCategories = Category::all();
        $postData = array();
        if(!empty($id)){
            $id = Crypt::decryptString($id);
            $postData = POST::find($id);
            $postData = json_decode(json_encode($postData), true);
        }
        return view('ask_a_question')->with(compact('allCategories','postData'));
    }
    public function saveQuestion(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug'=>'required',
            'body' => 'required',
            'category_id'=>'required',
            'status'=>'required',
            'tags_values'=>'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);
        $data = $request->all();
        if ($validator->fails()) {
            $redirectId = '';
            if(!empty($data['id'])){
                $redirectId = '/'.$data['id'];
            }
            return redirect('ask-a-question'.$redirectId)
                ->withErrors($validator)->withInput();
        }
        else{
            $postData = new Post;
            if(isset($data['id']) & !empty($data['id'])){
                $id = Crypt::decryptString($data['id']);
                $postData = POST::find($id);
            }
            $postData->tags = $data['tags_values'];
            unset($data['_token']);
            unset($data['tags_values']);
            unset($data['id']);
            foreach($data as $key=>$post){
                if(!empty($post)){
                    $postData->$key = $post;
                }
            }
            //echo "<pre>"; print_r($postData);die;
            if( $request->hasFile('image') ){
                $avatar = $request->file('image');
                if(!empty($avatar)){
                    $filename = time() . '.'. $avatar->getClientOriginalExtension();
                    $path = public_path('../storage/app/public/posts/January2018/'. $filename) ;
                    Image::make($avatar)->save( $path );
                    if(isset($data['old_image']) && !empty($data['image'])){
                        unlink(public_path('../storage/app/public/'. $data['old_image']));
                    }
                    $postData->image = 'posts/January2018/'. $filename;
                }
            }
            unset($postData->old_image);
            unset($postData->old_image);
            $postData->author_id = Auth::user()->id;
            $postData->save();
            $allCategories = Category::all();
            Session::flash('success', 'Question saved successfully as '.$data['status']); 
            return redirect('ask-a-question')->with(compact('allCategories'));
        }
    }
    public function view_user_profile(Request $request,$userId){
        $userData = User::where('id',$userId)->with('posts')->get();
        $userData = json_decode(json_encode($userData), true);
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
    public function view_user_answers($userId=''){ //questions where user gave answer
        if(empty($userId)){
            return view('/home');
        }
        $userId = Crypt::decryptString($userId);
        $results = PostAnswer::with('posts')->paginate(2);
        $posts = json_decode(json_encode($results), true);
        echo "<pre>"; print_r($posts);die;
    }
    public function draft_or_pending_questions($userId='',$status=''){
        if(empty($userId) || empty($status) ){
            return view('/home');
        }
        else{
            $userId = Crypt::decryptString($userId);
            $posts = POST::with('category')->with('author')->with('answers')->with('views')->where('posts.status',$status)->where('posts.author_id',$userId)->paginate(5);
            return view('posts/draft_or_pending_questions')->with(compact('posts'));
        }
    }
    public function posts_having_views($user_id = ''){
        if(empty($user_id)){
            return redirect('/home');
        }
        else{
            $user_id = Crypt::decryptString($user_id);
            $ViewData = DB::table('views')
                            ->select(DB::raw('DISTINCT views.post_id'))
                            ->join('posts','posts.id','=','views.post_id')
                            ->where('posts.author_id',$user_id)
                            ->where('posts.status','PUBLISHED')
                            ->get();
            foreach($ViewData as $d){    
                $data[] = $d->post_id;     
            }
            $posts = POST::with('category')->with('author')->with('answers')->with('views')->where('posts.status','PUBLISHED')->whereIn('id',$data)->paginate(5);
            return view('/home', array('posts'=> $posts));
        }
    }
}