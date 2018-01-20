<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use App\User;
use App\Country;
use App\Answer;
use App\Post;
use App\Category;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
use JildertMiedema\LaravelPlupload\Facades\Plupload;
use Illuminate\Support\Facades\Crypt;

class profileController extends Controller{
    public function profile(){
        $userId = Auth::user()->id;
        $user = User::where('id',$userId)->with('posts')->first();
        $userCategories = array();
        if(!empty($user->category_ids)){
            $userCategories = Category::whereIn('id',explode(',',$user->category_ids))->get();
        }
        /*$userCategories = json_decode(json_encode($userCategories));*/
        $answersCount = Answer::where('user_id',$userId)->count();
        $postViews = DB::table('views')
                            ->join('posts','posts.id','=','views.post_id')
                            ->where('posts.author_id',$userId)
                            ->where('posts.status','PUBLISHED')
                            ->count(DB::raw('DISTINCT post_id'));
        $ratings = DB::table('ratings')
                        ->selectRaw('round(avg(rating)) as sum')
                        ->where('profile_rated','=',$userId)
                        ->groupBy('profile_rated')
                        ->get();
        $pendingPostsCount = POST::where('author_id',$userId)->where('status','PENDING')->count();
        $draftPostsCount = POST::where('author_id',$userId)->where('status','DRAFT')->count();
    	return view('profile')->with(compact('user','answersCount','postViews','ratings','pendingPostsCount','draftPostsCount','userCategories'));
    }
    public function profileEdit(Request $request){
        if( $request->hasFile('file') ){
            $avatar = $request->file('file');
            $filename = time() . '.'. $avatar->getClientOriginalExtension();
            $path = public_path('../storage/app/public/users/November2017/'. $filename) ;
            Image::make($avatar)->resize(300,300)->save( $path );
            if(file_exists(public_path('../storage/app/public/'.Auth::user()->avatar))){
                unlink(public_path('../storage/app/public/'.Auth::user()->avatar));
            }
            $user = Auth::user();
            $user->avatar = 'users/November2017/'.$filename;
            $user->save();
        }
        $user = Auth::User();
        $allCountries = Country::all();
        $allCategories = Category::all();
        return view('profile_edit')->with(compact('user','allCountries','allCategories')); 
    }
    public function updateAvatar(Request $request){
        $abs_path='';
        if( $request->hasFile('file') ){
            $avatar = $request->file('file');
            $filename = time() . '.'. $avatar->getClientOriginalExtension();
            $path = public_path('../storage/app/public/users/November2017/'. $filename) ;
            Image::make($avatar)->resize(300,300)->save( $path );
            $user = Auth::user();
            $user->avatar = 'users/November2017/'.$filename;
            $user->save();
            $abs_path= Storage::url('').'users/November2017/'.$filename;
        }
        return  response()->json(array("status"=>true,"file"=>$abs_path));
    } 
    public function change_basic_info(Request $request){
        $data = $request->all();
        if($data['name']=="" || $data['email']=="" || $data['country']=="" || $data['state']=="" || $data['city']=="" ){
            echo "empty";die;
        }
        else{
            $user = User::find(Auth::user()->id);
            unset($data['_token']);
            foreach($data as $key=>$d){
                $user->$key = $d;
            }
            $user->updated_at = date('Y-m-d H:i:s');
            $user->save();
            echo "saved";die;
        }
    }
    public function change_password(Request $request){
        $data = $request->all();
        //echo "<pre>"; print_r($data);die;
        if($data['current_password']=="" || $data['new_password']=="" || $data['confirm_new_password']==""){
            echo '<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error!</strong>Please fill all the fields.</div>';die;
        }
        elseif($data['new_password']!=$data['confirm_new_password']){
            echo '<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error!</strong>New password and Confirm password should be same.</div>';die;
        }
        elseif(empty(Hash::check($data['current_password'], Auth::user()->password, []))){
            echo '<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error!</strong> You entered wrong current password.</div>';die;
        }
        else{
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($data['new_password']);
            $user->updated_at = date('Y-m-d H:i:s');
            $user->save();
            echo '<div class="alert alert-success fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong>Password updated successfully.</div>';
            die;
        }
    }
    public function save_work_info(Request $request){
        $data = $request->all();
        if($data['work_company']=="" && $data['designation']=="" && $data['skills']=="" && $data['biography']=="" && $data['category_ids']=="" ){
            echo '<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error!</strong> Please enter data before submit.</div>';die;
        }
        else{
            $user = User::find(Auth::user()->id);
            $user->category_ids = implode(',',$data['category_ids']);
            unset($data['category_ids']);
            foreach($data as $key=>$value){
                if(!empty($value)){
                    $user->$key = $value;
                }
            }
            $user->save();
            echo '<div class="alert alert-success fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> Information updated successfully.</div>';
            die;
        }
    }
}