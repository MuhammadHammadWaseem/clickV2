<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index(Request $request, $id)
    {
        return view('Panel.dashboard.invitation');
    }
}