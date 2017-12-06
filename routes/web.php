<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/
Route::get('/email', function () {
    return view('email');
});
Route::get('auth/fb', 'Auth\fbController@redirectToProvider');
Route::get('auth/fb/callback', 'Auth\fbController@handleProviderCallback');

Route::get('auth/google', 'Auth\googleController@redirectToProvider');
Route::get('auth/google/callback', 'Auth\googleController@handleProviderCallback');

Route::auth();

//Route::get('/home', 'HomeController@index');

Route::get('/home', function () {
    $posts = App\Post::all();
    return view('home', compact('posts'));
});
/*
Route::post('profile/upload', function()
{
    return Plupload::receive('file', function ($file)
    {
        $file->move(storage_path() . '/app/public/users/November2017/', $file->getClientOriginalName());
        return 'ready';
    });
});*/

Route::get('post/{slug}' , 'HomeController@show');
Route::get('profile', 'profileController@profile');
Route::post('profile/upload', 'profileController@updateAvatar');

Route::get('profile_edit', 'profileController@profileEdit');
Route::post('profile_edit', 'profileController@updateAvatar');

/*
Route::get('/index', 'IndexController@index');
Route::get('/login', 'Auth\AuthController@authenticate');
*/

// Route::get('/loginError', 'Auth\AuthController@showLoginError');

// Route::get('/signup', 'Auth\AuthController@showSignupForm');
//Route::any('/logout', 'Auth\AuthController@logout');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

