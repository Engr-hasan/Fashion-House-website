<?php

namespace App\Http\Controllers;
use App\HomeSlider;
use App\Clients;
use App\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $HomeSliderCount = HomeSlider::all()->count();
        $ClientsCount = Clients::all()->count();
        $GalleryCount = Gallery::all()->count();
        return view('home',compact('HomeSliderCount','ClientsCount','GalleryCount'));
    }
}
