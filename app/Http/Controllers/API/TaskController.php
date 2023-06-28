<?php

//namespace App\Http\Controllers;
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;



class TaskController extends Controller
{
    public function index(){
        $data = Task::all();
        
        return response()->json(['status' => '200', 'success' => true, 'data' => $data]);
    }

    public function view($id){
        $data = Task::find($id);
        
        return response()->json(['status' => '200', 'success' => true, 'data' => $data]);
    }

    public function store(){
        $validated = request()->validate([
            'task' => ['required','string', 'max:30'],
            'description' => ['string', 'max:255']
        ]);

        $data = Task::create($validated);
        return response()->json(['status' => '200', 'added' => true, 'data' => $data]);
    }

    public function update($id){
        $data = Task::findOrFail($id);
        $data->update(request()->all());
    
        return response()->json(['status' => '200', 'updated' => true, 'data' => $data]);
    }

    public function done($id){
        $data = Task::findOrFail($id);
        request()->merge(['completed' => 1]);
        $data->update(request()->all());

        return response()->json(['status' => '200', 'completed' => true, 'data' => $data]);
    }

    public function delete($id){
        $data = Task::findOrFail($id)->delete();

        return response()->json(['status' => '200', 'deleted' => true, 'data' => $data]);
    }
}
