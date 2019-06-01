<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * The Front Page
     */
    public function front()
    {
        // Retrieve Projects
        $projects = Project::all();

        return view('front', ['projects' => $projects]);
    }
}
