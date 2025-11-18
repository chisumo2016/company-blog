<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Clarify;
use App\Models\Connect;
use App\Models\Feature;
use App\Models\Finance;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Title;
use App\Models\Usability;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public  function index()
    {
        $testimonials   = Testimonial::latest()->limit(6)->get();
        $features       = Feature::latest()->get();
        $connects      =  Connect::whereIn('id',[1,2,3])->get()->keyBy('id');
        $answers       = Answer::latest()->limit(5)->get();

        $slider     = Slider::find(1);
        $title      = Title::find(1);
        $clarify    = Clarify::find(1);
        $finance    = Finance::find(1);
        $usability   = Usability::find(1);



        return view('home.index' , compact(
   'testimonials' ,
'slider' ,
            'title' ,
            'features',
            'clarify',
            'finance',
            'usability',
            'connects',
            'answers',
        ));
    }
}
