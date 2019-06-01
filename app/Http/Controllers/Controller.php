<?php

namespace App\Http\Controllers;

use App\Project;
use Carbon\Carbon;
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

        // Calculate age
        $date = Carbon::parse(env('ADMIN_DATE_OF_BIRTH'));
        $now = Carbon::now();

        $admin = [
            'date_of_birth' => env('ADMIN_DATE_OF_BIRTH'),
            'age' => $date->diffInYears($now)
        ];

        return view('front', ['projects' => $projects, 'admin' => $admin]);
    }
}
