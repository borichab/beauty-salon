<?php

namespace App\Http\Controllers;
use App\SliderImages;
use App\parlours;

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
        $photos = SliderImages::all();
        $parlours = parlours::where('availability', 'available')->get();
        return view('welcome', compact('photos', 'parlours'));
    }
}
