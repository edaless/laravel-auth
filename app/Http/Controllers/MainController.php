<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Project;

class MainController extends Controller
{
    // private function getValidationRules(Project $project)
    // {
    //     return [
    //         'name' => 'required|string|min:1|max:64|unique:projects, name,' . $project->id,
    //         'description' => 'nullable|string',
    //         'main_image' => 'required|string|unique:projects, main_image,' . $project->id,
    //         'release_date' => 'required|date|before:today',
    //         'repo_link' => 'required|string|unique:projects, repo_link,' . $project->id,
    //     ];
    // }
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
            'name' => 'required|string|min:1|max:64|unique:projects,name',
            'description' => 'nullable|string',
            'main_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'release_date' => 'required|date|before:today',
            'repo_link' => 'required|string|unique:projects,repo_link',
        ]);

        // versione di Giovanni
        // $img_path = Storage::put('uploads', $data['main_image']);
        // mia versione:
        // salvo l'immagine nella cartella uploads dentro public
        Storage::put('public/uploads', $data['main_image']);
        // salvo il path senza public
        $img_path = Storage::put('uploads', $data['main_image']);
        // il secondo storage però salva inutilmente una seconda volta l'immagine
        // (in un'altra cartella uploads che è fuori dalla cartella public)


        $data['main_image'] = $img_path;


        $project = Project::create($data);
        return redirect()->route('project.show', $project);
    }
    public function delete(Project $project)
    {
        $project->delete();
        return redirect()->route('home');
    }
    public function edit(Project $project)
    {
        return view('pages.project.edit', compact('project'));
    }
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required|string|min:1|max:64|unique:projects,name,' . $project->id,
            'description' => 'nullable|string',
            'main_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'release_date' => 'required|date|before:today',
            'repo_link' => 'required|string|unique:projects,repo_link,' . $project->id,
        ]);


        // versione di Giovanni
        // $img_path = Storage::put('uploads', $data['main_image']);
        // mia versione:
        // salvo l'immagine nella cartella uploads dentro public
        Storage::put('public/uploads', $data['main_image']);
        // salvo il path senza public
        $img_path = Storage::put('uploads', $data['main_image']);
        // il secondo storage però salva inutilmente una seconda volta l'immagine
        // (in un'altra cartella uploads che è fuori dalla cartella public)


        $data['main_image'] = $img_path;


        $project->update($data);
        $project->save();
        return redirect()->route('project.show', $project);
    }
}
