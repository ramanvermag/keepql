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

Route::get('/email', function () {
    return view('email');
});
Route::get('auth/fb', 'Auth\fbController@redirectToProvider');
Route::get('auth/fb/callback', 'Auth\fbController@handleProviderCallback');

Route::get('auth/google', 'Auth\googleController@redirectToProvider');
Route::get('auth/google/callback', 'Auth\googleController@handleProviderCallback');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('post/{slug}' , 'HomeController@show');
Route::get('profile', 'profileController@profile');
Route::post('profile/upload', 'profileController@updateAvatar');

Route::get('profile_edit', 'profileController@profileEdit');
Route::post('profile_edit', 'profileController@updateAvatar');
Route::post('post/answers', 'PostsController@saveAnswers');
Route::post('post/saveVotes','PostsController@saveVotes');
Route::post('users/profile-rating','HomeController@profile_rating');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::match(array('GET', 'POST'), '/edit-profile', 'profileController@profileEdit');
Route::post('change_basic_info', 'profileController@change_basic_info');
Route::post('change_password', 'profileController@change_password');
Route::get('ask-a-question', 'PostsController@ask_a_question');
Route::post('saveQuestion', 'PostsController@saveQuestion');
Route::get('view-user-profile/{id}', 'PostsController@view_user_profile');
Route::get('view-questions/{id}', 'HomeController@index');
Route::get('view-questions', 'HomeController@index');
Route::get('view-user-answers/{id}', 'PostsController@view_user_answers');
Route::post('save_work_info','profileController@save_work_info');