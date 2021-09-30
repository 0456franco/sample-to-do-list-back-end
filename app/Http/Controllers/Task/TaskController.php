<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index(Task $task, Request $request){
        return $task->index($request);
    }

}
