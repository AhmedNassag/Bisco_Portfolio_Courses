<?php

namespace App\Http\Controllers;

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
        // return view('home');
        if (auth()->user()->roles_name != null) {
            return view('home');
        } else {
            $courseItems = \App\Models\CourseItem::latest()->get();
            return view('site.pages.courses', compact('courseItems'));
        }
    }
}
