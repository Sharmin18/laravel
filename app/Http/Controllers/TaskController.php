<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
    	// Fetch all data from tasks table and then return to view
    	$tasks = Task::orderBy('id', 'desc')->get();

    	return view('tasks.index')
    		->with('tasks', $tasks);
    }

    public function create()
    {
    	return view('tasks.create');
    }

    public function store(Request $takeUserInput)
    {
    	$validator = Validator::make($takeUserInput->all(), [
            'title' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

    	// Store
    	/*$task = new Task();

    	$task->title = $takeUserInput->title;
    	$task->description = $takeUserInput->description;
    	
    	$task->save();*/

    	Task::create([
    		'title' => $takeUserInput->title,
    		'description' => $takeUserInput->description,
    	]);

    	return redirect()->route('home');
    }

    public function toggle($id)
    {
    	$task = Task::where('id', $id)->first();

    	if (! $task) {
    		return redirect()->back();
    	}

    	$task->update([
    		'status' => ($task->status == 1) ? 0 : 1
    	]);

    	return redirect()->back();
    }
}
