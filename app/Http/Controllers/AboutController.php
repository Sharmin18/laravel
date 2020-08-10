<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
	/**
	 * Read more how to pass data from the controller to view
	 * https://laravel.com/docs/7.x/views#creating-views
	 */
    public function about()
    {
    	$numbers = range(1, 1000);
    		
    	return view('about')->with('numbers', $numbers);
    }
}
