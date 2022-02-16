<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks();
        return view('dashboard', compact('tasks'));
    }
    public function add()
    {
    	return view('add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);
    	$task = new Task();
    	$task->description = $request->description;
    	$task->user_id = auth()->user()->id;
    	$task->save();
    	return redirect('/dashboard'); 
    }

    public function edit(Task $task)
    {

    	if (auth()->user()->id == $task->user_id)
        {            
                return view('edit', compact('task'));
        }           
        else {
             return redirect('/dashboard');
         }            	
    }

    public function update(Request $request, Task $task)
    {
    	if(isset($_POST['delete'])) {
    		$task->delete();
    		return redirect('/dashboard');
    	}
    	else
    	{
            $this->validate($request, [
                'description' => 'required'
            ]);
    		$task->description = $request->description;
	    	$task->save();
	    	return redirect('/dashboard'); 
    	}    	
    }

    public function done()
    {
    	return view('/dashboard');
    }

    public function share(Request $request, Task $task)
    {
    	if(isset($_POST['facebookShare'])) {
            $facebookShare_url = "https://www.facebook.com/sharer/sharer.php?u=127.0.0.1:8000&display=popup&quote={$task->description}" ;
            header("Location: " . "$facebookShare_url");
            exit();
    	}
    	else if (isset($_POST['twitterShare']))
    	{
            $twitterShare_url = "http://twitter.com/share?text={$task->description}&url=http://laravel&hashtags=todolist,jarntai,laravel" ;
            header("Location: " . "$twitterShare_url");
            exit();
    	}    	
        else {
            return view('/dashboard');
        }
    }

}

