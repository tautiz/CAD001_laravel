<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function contacts(Request $request)
    {
        return view('public.landing-pages.contacts');
    }

    public function aboutUs(Request $request)
    {
        return view('public.landing-pages.about-us');
    }
}
