<?php

//namespace App\Http\Controllers;
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Task;



class TaskController extends Controller
{
    public function getTasks(){
        $tasks = Task::all();
        return $tasks;
    }

    public function getTask($id){
        $task = Task::where('id', $id)->get();
        return $task;
    }

    public function postNewTask(){
        
    }
}
