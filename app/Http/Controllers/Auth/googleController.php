<?php

namespace App\Http\Controllers\Auth;
use Socialite;
use Auth;
use App\User;

class googleController extends LoginController
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        // die('hggj');
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {

        $user = Socialite::driver('google')->user();

        $data = [
            'social_id' => $user->getId(),
            'email' => $user->getEmail(),
            'name' => $user->getName(),
            'password' => 'google',
            'account_type' => 'Google'
        ];
       

        //dd($data);
        //DIE();

        /* 
        if (User::where('email', '=', $user->getEmail() )->exists()) {
           return redirect()->to('loginError');
           //die('Email id already exists');
        }else{
           Auth::login( User::firstOrCreate( $data )); 
           return redirect()->to('home');
        } 
        */

        $my_user = User::where('email','=', $user->getEmail())->first();
        if($my_user === null) {
                Auth::login(User::firstOrCreate($data));
        } else {
            Auth::login($my_user);
        }

        // dd($data);
        // Auth::login( User::firstOrCreate( $data ));
        return redirect()->to('home');

    }

}