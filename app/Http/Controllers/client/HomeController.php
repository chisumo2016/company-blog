<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Title;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public  function index()
    {
        $testimonials   = Testimonial::latest()->limit(6)->get();
        $features       = Feature::latest()->get();

        $slider = Slider::find(1);

        $title = Title::find(1);

        return view('home.index' , compact(
   'testimonials' ,
'slider' ,
            'title' ,
            'features'
        ));
    }
}
