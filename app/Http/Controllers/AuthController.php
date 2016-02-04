<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    
    // protected $redirectPath = '/dashboard';

	public function __construct()
    {
		$this->middleware('guest', ['except' => 'getLogout']);
	}
    
    public function getLogin()
    {
    	return view('auth.login');
    }

    public function postLogin(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required',
    	]);

    	$email = $request->get('email');
    	$password = $request->get('password');

        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            // Authentication passed...
            return redirect()->intended('/dashboard');
        }
        return redirect()->back()->with('message','Email or Password invalid');
    }

    public function getRegister()
    {
    	return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|confirmed|min:6'
        ]);

        $RegisteredUser = User::create([
            'name'      => $request['name'],
            'email'     => $request['email'],
            'password'  => bcrypt($request['password']),
        ]);

        return redirect()->back()->with('message', 'You Are Sucessfully Registered, Please Login');
    }

    public function getLogout()
    {
    	Auth::logout();
    	return redirect('auth/login');
    }
}
