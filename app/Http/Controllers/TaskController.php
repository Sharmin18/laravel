<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $sort = request()->sort;

        if ($sort == 'done') {
            $tasks = Task::orderBy('id', 'desc')->where('status', 1)->paginate(10);    
        } elseif($sort == 'pending'){
            $tasks = Task::orderBy('id', 'desc')->where('status', 0)->paginate(10);    
        } else {
            // Fetch all data from tasks table and then return to view
            $tasks = Task::orderBy('id', 'desc')->paginate(10);
        }

        $keyword = request()->keyword;

        if ( $keyword != '') {
            $tasks = Task::where('title', 'LIKE', "%$keyword%")
                ->orderBy('id', 'desc')->paginate(10);   
        }

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

    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit')
            ->with('task', $task);
    }

    public function update($id, Request $takeUserInput)
    {
        ## Approach 1
        /*$task = Task::where('id', $id)->first();

        if (! $task) {
            return redirect()->back();
        }

        $task->update([
            'title' => $takeUserInput->title,
            'description' => $takeUserInput->description,
        ]);*/

        /*## Approach 2
        $task = Task::find($id);

        $task->update([
            'title' => $takeUserInput->title,
            'description' => $takeUserInput->description,
        ]);*/

        ## Approach 3
        Task::where('id', $id)->update([
            'title' => $takeUserInput->title,
            'description' => $takeUserInput->description,
        ]);

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return redirect()->route('home');
    }
}
