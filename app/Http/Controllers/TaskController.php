<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function update(Request $request)
    {
        $task = Task::findOrFail($request->taskId);
        $task->is_done = $request->status;
        $task->save();
        return [
            'success' => true,
            'countTasksDone' => Task::where('is_done', '=', 1)->count(),
            'countTasksNotDone' => Task::where('is_done', '!=', 1)->count(),
            'totalTasks' => Task::count(),
        ];
    }


    public function index()
    {

    }

    public function create(Request $request)
    {
        /* if(!Auth::check()){
            return redirect()->route('login');
        } */
        
       $categories = Category::all();
       $data['categories'] = $categories;

        return view('tasks.create', $data);
    }

    public function create_action(Request $request)
    {
        $task = $request->only('title', 'category_id','description','due_date');
        $task['user_id'] = 1;
        $dbTask = Task::create($task);
        return redirect(route('home'));
    }

    public function edit(Request $request)
    {
        /* if(!Auth::check()){
            return redirect()->route('login');
        } */
        
        $id = $request->id;

        $task = Task::find($id);
        if(!$task){
            return redirect(route('home'));
        }
        
        $categories = Category::all();
        $data['categories'] = $categories;
        $data['task'] = $task;

        return view('tasks.edit', $data);
    }

    public function edit_action(Request $request)
    {
        $request_data = $request->only(['title', 'due_date', 'category_id', 'description']);

        $request_data['is_done'] = $request->is_done ? true : false;
        $task = Task::find($request->id);
        if(!$task){
            return "Erro de task 404";
        }

        
        $task->update($request_data);
        $task->save();
        return redirect(route('home'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);
        if($task){
            $task->delete();
        }
        return redirect(route('home'));
    }
}
