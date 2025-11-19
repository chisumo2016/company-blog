<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function  index()
    {
        $teams = Team::latest()->get();

        $app       = App::find(1);

        return view('home.team.index' , compact('app','teams'));
    }
}
