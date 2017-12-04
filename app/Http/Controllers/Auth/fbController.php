<?php

namespace App\Http\Controllers\Auth;
use Socialite;
use Auth;
use App\User;

class fbController extends LoginController
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {

        $user = Socialite::driver('facebook')->user();

        $data = [
            'email' => $user->getEmail(),
            'name'  => $user->getName(),
            'password'=> 'facebook',
            'social_id' => $user->getId(),
            'account_type' => 'Facebook'

        ];

        if($data['email'] == null ){
            $data['email'] = preg_replace('/\s+/', '',  strtolower( $data['name'].'@facebook.com' ) );
            //echo 'here:';
           // dd( $data['email'] );
           //  die('huh');
        
        }
       

/*
where emial_id = null
insert email_id = [username]@facebook.com
*/
        $my_user = User::where('email','=', $user->getEmail())->first();
        if($my_user === null) {

            if($data['email'] == null ){
                $data['email'] = preg_replace('/\s+/', '',  strtolower( $data['name'].'@facebook.com' ) );
                //echo 'here:';
                // dd( $data['email'] );
                //  die('huh');
                
            }
            Auth::login(User::firstOrCreate($data));
                
        } else {
            Auth::login($my_user);
        }

        //dd($data);
        // Auth::login(User::firstOrCreate($data));
        return redirect()->to('home');

    }

}