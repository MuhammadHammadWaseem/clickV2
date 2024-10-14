<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class WebController extends Controller
{
    public function lang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return Redirect::back();
    }
    public function index()
    {
        return view('Website.home');
    }
    public function events()
    {
        return view('Website.events');
    }
    public function features()
    {
        return view('Website.features');
    }
    public function about()
    {
        return view('Website.about');
    }
    public function contact()
    {
        return view('Website.contact');
    }
}
