<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Show the public home page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('home.index');
    }
}
