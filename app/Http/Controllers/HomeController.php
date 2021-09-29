<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Review;
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
        $blogs = Blog::all();
        return view('blog', compact('blogs'));
    }

    public function blogDetail(Blog $blog)
    {
        return view('blog-detail', compact('blog'));
    }

    public function review()
    {
        $reviews = Review::all();
        return view('review', compact('reviews'));
    }
}
