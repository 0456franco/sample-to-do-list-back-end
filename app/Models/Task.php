<?php

namespace App\Models;

use Auth;
use Image;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use SoftDeletes;

    public $table = "tasks";

    public function project(){
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    } 

    public function index(Request $request){

        $validatedData = $request->validate([
            'id' => ['numeric', 'required']
        ]);

        $taskList = Task::select('*')->where('project_id', $validatedData['id'])->get();

        foreach ($taskList as $task) {
            $task->user_list = User::select('*')->where('id', $task->user_id)->get();
        }

        return response([
            'success' => true,
            'task_list' => $taskList
        ]);

    }

}
