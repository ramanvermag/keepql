<?php

namespace App;
use Auth;
use App\Rating;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password', 'social_id', 'account_type','country','state','city','last_logged_in','biography'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function posts(){
        return $this->hasMany('App\Post','author_id','id')->where('status','PUBLISHED');
    }
    public function saveRating($data){
        $rating = Rating::where('profile_rated',$data['userId'])
                    ->where('rated_by',Auth::user()->id)->first();
        $obj = new Rating;
        if(!empty($rating)){
            $obj = Rating::find($rating->id);
        }
        $obj->rating = $data['stars'];
        $obj->profile_rated = $data['userId'];
        $obj->rated_by = Auth::user()->id;
        $obj->save();
    }
}
