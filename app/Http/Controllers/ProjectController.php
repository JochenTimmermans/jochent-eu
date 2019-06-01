<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function view($id)
    {
        $project = Project::findOrFail($id);

        return view('project', ['project' => $project]);
    }
}
