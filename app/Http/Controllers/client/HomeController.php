<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public  function index()
    {
        $testimonials = Testimonial::latest()->get();

        return view('home.index' , compact('testimonials'));
    }
}
