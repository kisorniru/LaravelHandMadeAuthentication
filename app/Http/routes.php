<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('dashboard', 'booksController');

// Route::get('dashboard', ['middleware' => 'auth', function(){
// 		echo 'Welcome home '. Auth::user()->email . ' .';
// }]);

Route::get('admin', ['middleware' => 'admin', function(){
	echo 'Welcome to your admin page';
}]);

Route::get('user/{id}',function($id){
	$user = App\User::find($id);
	echo 'The user with ID of '. $id .' has an email of: '. $user->email;
});

// Authentication routes...
Route::get('auth/login', 'AuthController@getLogin');
Route::post('auth/login', 'AuthController@postLogin');
Route::get('auth/logout', 'AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'AuthController@getRegister');
Route::post('auth/register', 'AuthController@postRegister');