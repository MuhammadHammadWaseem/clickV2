<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayController extends Controller
{
    public function index($id)
    {
        return view('Panel.dashboard.pay');
    }
}
