<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public $team = [
        [
            'name' => 'Fiorella',
            'job' => 'CEO',
            'image' => 'https://i.pravatar.cc/100?u=Fiorella',
        ],
        [
            'name' => 'Toto',
            'job' => 'CTO',
            'image' => 'https://i.pravatar.cc/100?u=Toto',
        ],
    ];

    public function index()
    {
        return view('about', [
            'title' => 'Webflix',
            'team' => $this->team,
        ]);
    }

    public function show($user)
    {
        $users = collect($this->team)->pluck('name')->all(); // ['Fiorella', 'Toto'];

        if (! in_array($user, $users)) {
            abort(404); // Renvoie une 404
        }

        return view('about-show', [
            'user' => $user,
        ]);
    }
}
