<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use Illuminate\Support\Facades\Auth;

class WebPageController extends Controller
{
    public function index(Request $request, $id)
    {
        $event = Event::with('eventType')->where('id_event', $id)
            ->where('id_user', Auth::id())
            ->first();

        $photogallery = PhotoGallery::where('id_event', $event->idevent)->get();
        $videogallery = VideoGallery::where('id_event', $event->idevent)->get();

        return view('Panel.dashboard.WebPage',compact('event','photogallery','videogallery'));
    }
}
