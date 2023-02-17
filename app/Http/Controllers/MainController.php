<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class MainController extends Controller
{
    public function home()
    {
        $projects = Project::all();

        return view('pages.home', compact('projects'));
    }
    public function privateHome()
    {
        $projects = Project::all();

        // $data = [
        //     'projects' => $projects
        // ];

        return view('pages.private-home', compact('projects'));

        // return view('pages.private-home');
    }
    public function projectShow(Project $project)
    {

        return view('pages.projectShow', compact('project'));
    }
}
