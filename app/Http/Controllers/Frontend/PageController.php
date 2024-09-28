<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;

class PageController extends Controller
{
    public function home()
    {
        $featuredCars = Car::latest()->take(9)->get();
        return view('frontend.home', compact('featuredCars'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactSubmit() {

    }
}
