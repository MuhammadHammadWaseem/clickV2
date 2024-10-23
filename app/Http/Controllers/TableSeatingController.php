<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableSeatingController extends Controller
{
    public function index() {
        return view("Panel.dashboard.guest-list.index");
    }
}
