<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    public function index(Request $req)
    {
        $eventList = EventType::get();
        $events = Event::where('id_user', Auth::id())->get();
        return view('Panel.index',compact('eventList','events'));
    }

}
