<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $resquest)
    {
        /* if(!Auth::check()){
            return redirect()->route('login');
        } */

        if($resquest->date){
            $filteredDate = $resquest->date;
        }else{
            $filteredDate = date('Y-m-d');
        }

        $carbon = Carbon::createFromDate($filteredDate);
        Carbon::setLocale('pt_BR');

        $data['date_as_string'] =  $carbon->translatedFormat('d').' de '.ucfirst($carbon->translatedFormat('M'));
        $data['date_prev_button'] = $carbon->addDay(-1)->format('Y-m-d');
        $data['date_next_button'] = $carbon->addDay(2)->format('Y-m-d');

        $data['tasks'] = Task::whereDate('due_date', $filteredDate)->get();
        $data['AuthUser'] =  Auth::user();

        $data['tasks_count'] = $data['tasks']->count();
        $data['undone_tasks_count'] = $data['tasks']->where('is_done', false)->count();
        
        $tasks = Task::orderBy('id', 'DESC')->paginate(5);
        $countTasksDone = Task::where('is_done', '=', 1)->count();
        $countTasksNotDone = Task::where('is_done', '!=', 1)->count();
        $countTasks = Task::count();

        return view('home',[
            'tasks' => $tasks, 
            'countTasksDone' => $countTasksDone,
            'countTasksNotDone'  => $countTasksNotDone,
            'countTasks' => $countTasks,
            'data' => $data
        ]);
    }
}
