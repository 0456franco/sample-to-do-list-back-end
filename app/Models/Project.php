<?php

namespace App\Models;

use Auth;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'projects';

    public function tasks(){
        return $this->hasMany('App\Models\Task', 'project_id', 'id');
    }    

    public function users(){
        return $this->belongsToMany('App\Models\User', 'project_pivot', 'user_id', 'id');
    } 

    public function show(Request $request){

        $validatedData = $request->validate([
            'slug' => ['required', 'string']
        ]);
        
        $success = false;

        $slug = $validatedData['slug'];

        $project = Project::select('id', 'name', 'slug')
        ->where('slug', $slug)
        ->get()[0];

        if($project){
            
            $success = true;

        } else {

            throw new Exception("Invalid project selection.");
            $project = null;

        }

        $response = response([
            "success" => $success,
            "project" => $project
        ]);

        return $response;

    }

    public function index(){

        return response([
            'success' => true,
            'projectList' => Project::select('*')->get()
        ]);

    }

}