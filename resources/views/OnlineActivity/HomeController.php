<?php

namespace App\Http\Controllers;
use App\User;
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
        $users = User::all();
        $HomeSliderCount = HomeSlider::all()->count();
        $ClientsCount = Clients::all()->count();
        $GalleryCount = Gallery::all()->count();
        return view('home',compact('users','HomeSliderCount','ClientsCount','GalleryCount'));
    }

    public function fontPage(){
        echo "string";
    }
}
