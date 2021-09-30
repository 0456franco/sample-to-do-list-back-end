<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function show(Request $request, Project $project)
    {
        return $project->show($request);
    }

    public function index(Project $project)
    {
        return $project->index();
    }

}
