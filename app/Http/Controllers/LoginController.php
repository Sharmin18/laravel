<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create()
    {
    	return view('login.create');
    }

    public function store(Request $request)
    {
    	/*$user = User::where('email', $request->email)
    		->where('password', bcrypt($request->password))
    		->first();*/

    	$userInput = $request->only('email', 'password');

    	if (Auth::attempt($userInput)) {
    		return redirect()->route('tasks');
    	}

    	return redirect()->back();
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
