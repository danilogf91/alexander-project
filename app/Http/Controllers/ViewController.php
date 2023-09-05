<?php

namespace App\Http\Controllers;

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
}
