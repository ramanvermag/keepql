<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Illuminate\Support\Facades\Storage;
use JildertMiedema\LaravelPlupload\Facades\Plupload;

class profileController extends Controller
{
    //
    public function profile(){

    	return view('profile', array('user'=> Auth::User() ) );	

    }
    public function profileEdit(){

        return view('profile', array('user'=> Auth::User() ) ); 

    }
    public function updateAvatar(Request $request){

        

        if( $request->hasFile('file') ){
            $avatar = $request->file('file');
            $filename = time() . '.'. $avatar->getClientOriginalExtension();
            $path = public_path('../storage/app/public/users/November2017/'. $filename) ;
            //Image::make($avatar)->resize(300,300)->save( public_path('/storage/users/November2017/'. $filename) );
            Image::make($avatar)->resize(300,300)->save( $path );
            $user = Auth::user();
            $user->avatar = 'users/November2017/'.$filename;
            $user->save();
           
        }
        return ;
         //return view('profile', array('user'=> Auth::User() ) ); 

    } 

    


    /*
    public function updateAvatar(Request $request){

      	if( $request->hasFile('avatar') ){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.'. $avatar->getClientOriginalExtension();
            $path = public_path('../storage/app/public/users/November2017/'. $filename) ;
    		//Image::make($avatar)->resize(300,300)->save( public_path('/storage/users/November2017/'. $filename) );
            Image::make($avatar)->resize(300,300)->save( $path );
    		$user = Auth::user();
    		$user->avatar = 'users/November2017/'.$filename;
    		$user->save();
    	}

    	return view('profile', array('user'=> Auth::User() ) );	

    } 
    */
}
