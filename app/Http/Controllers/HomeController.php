<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Post;

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

    /*function time_ago( $time )
    {
        $TIMEBEFORE_NOW = 'now';
        $TIMEBEFORE_MINUTE = '{num} minute ago' ;
        $TIMEBEFORE_MINUTES = '{num} minutes ago' ;
        $TIMEBEFORE_HOUR = '{num} hour ago' ;
        $TIMEBEFORE_HOURS = '{num} hours ago' ;
        $TIMEBEFORE_YESTERDAY = 'yesterday' ;
        $TIMEBEFORE_FORMAT = '%e %b' ;
        $TIMEBEFORE_FORMAT_YEAR = '%e %b, %Y' ;

        $out    = ''; // what we will print out
        $now    = time(); // current time
        $diff   = $now - $time; // difference between the current and the provided dates

        if( $diff < 60 ) // it happened now
            return $TIMEBEFORE_NOW;

        elseif( $diff < 3600 ) // it happened X minutes ago
            return str_replace( '{num}', ( $out = round( $diff / 60 ) ), $out == 1 ? $TIMEBEFORE_MINUTE : $TIMEBEFORE_MINUTES );

        elseif( $diff < 3600 * 24 ) // it happened X hours ago
            return str_replace( '{num}', ( $out = round( $diff / 3600 ) ), $out == 1 ? $TIMEBEFORE_HOUR : $TIMEBEFORE_HOURS );

        elseif( $diff < 3600 * 24 * 2 ) // it happened yesterday
            return $TIMEBEFORE_YESTERDAY;

        else // falling back on a usual date format as it happened later than yesterday
            return strftime( date( 'Y', $time ) == date( 'Y' ) ? $TIMEBEFORE_FORMAT : $TIMEBEFORE_FORMAT_YEAR, $time );
    }*/

}
