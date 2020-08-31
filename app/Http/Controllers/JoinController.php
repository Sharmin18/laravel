<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class JoinController extends Controller
{
    public function create()
    {
    	return view('join.create');
    }

    public function store(Request $userInput)
    {
    	$user = User::where('email', $userInput->email)->first();

    	if ($user) {
    		return redirect()->back();
    	}
    	
    	User::create([
    		'email' => $userInput->email,
    		'password' => bcrypt($userInput->password),
    	]);

    	return redirect()->route('login');
    }
}
