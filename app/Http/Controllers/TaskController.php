<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
    	// Fetch all data from tasks table and then return to view
    	$tasks = Task::orderBy('id', 'desc')->get();

    	return view('tasks.index')
    		->with('tasks', $tasks);
    }
}
