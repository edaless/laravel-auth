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

        return view('pages.private-home', compact('projects'));
    }
    public function projectShow(Project $project)
    {

        return view('pages.projectShow', compact('project'));
    }
    public function create()
    {

        return view('pages.project.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:1|max:64|unique:projects',
            'description' => 'nullable|string',
            'main_image' => 'required|string',
            'release_date' => 'required|date|before:today',
            'repo_link' => 'required|string|unique:projects'
        ]);
        dd($data);
        // return view('pages.project.store');
    }
}
