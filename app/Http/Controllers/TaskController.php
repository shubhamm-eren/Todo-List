<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
    	$url=url('/add');
    	$title="Todo List";
    	$button="Add Task";
    	$tasks=Task::all();
    	$data=compact('tasks','button','url','title');
    	// print_r($data);
    	return view('todo')->with($data);
    }
 	public function add(Request $req){
 		$req->validate(
 			[
 				'title' => 'required',
 				'description' => 'required'
 			]
 		);
 		$req->all();
    	$task = new Task;
    	$task->title = $req['title'];
    	$task->description = $req['description'];
    	$task->save();
    	return redirect('todo');
    }
    public function destroy($id){
    	$task= Task::find($id);
		if(!is_null($task)){
			$task->delete();
		};
		return redirect('todo');
    }	

    public function edit($id){
    	$edit_task= Task::find($id);
    	$tasks=Task::all();
    	$title="Update Task";
    	$button="Update";
		if(is_null($edit_task)){
			// $task->edit();
			return redirect('todo');
		}else{	
			// print_r($edit_task);
    		$url=url('/todo/update').'/'.$id;
			$data=compact('edit_task','url','tasks','title','button');
			return view('todo')->with($data);
		}
    }

    public function update($id,Request $req){
    	$task = Task::find($id);
    	$req->validate(
 			[
 				'title' => 'required',
 				'description' => 'required'
 			]
 		);	

 		$task->title = $req['title'];
    	$task->description = $req['description'];
    	$task->save();

    	return redirect('todo');

    }	
}
