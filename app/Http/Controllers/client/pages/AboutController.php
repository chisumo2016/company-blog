<?php

namespace App\Http\Controllers\client\pages;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Answer;
use App\Models\App;
use App\Models\Core;
use App\Models\Team;
use App\Models\Title;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::latest()->get();

        $teams  = Team::latest()->get();
        $answers = Answer::latest()->get();
        $cores = Core::latest()->get();

        $app       = App::find(1);
        $title      = Title::find(1);
        $about  = About::find(1);


        return view('home.pages.about.index' , compact(
            'app',
            'abouts' ,
            'teams',
            'answers',
            'title' , 'cores','about'));
    }


}
