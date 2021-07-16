<?php

namespace App\Http\Controllers;

use App\Models\Slider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('index', compact('sliders'));
    }

    public function blog()
    {
        return view('blog');
    }

    public function blogDetail($id)
    {
        return view('blog-detail');
    }

    public function review()
    {
        return view('review');
    }
}
