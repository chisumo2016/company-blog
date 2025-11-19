<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\Team;
use App\Models\Title;

class TeamController extends Controller
{
    public function  index()
    {
        $teams = Team::latest()->get();

        $app       = App::find(1);

        return view('home.team.index' , compact('app','teams'));
    }
}
