<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Project;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function users()
    {
        $user = auth()->user();
        return view('users')->with('user', $user);
    }

    public function projects()
    {
        $user = auth()->user();
        return view('projects')->with('user', $user);
    }

    public function data($id)
    {
        $project = Project::find($id);

        if (!$project) {
            abort(404);
        }

        $data = $project->data;

        // dd($project);

        $name = $project->name;

        $user = auth()->user();

        return view('data', compact(['data', 'name', 'id', 'user']));
    }
}
