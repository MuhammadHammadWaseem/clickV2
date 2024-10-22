<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;

class PhotoController extends Controller
{
    public function index($id)
    {
        $event = Event::with('eventType')->where('id_event', $id)
            ->where('id_user', Auth::id())
            ->first();

        $photogallery = PhotoGallery::where('id_event', $event->id_event)->get();
        $videogallery = VideoGallery::where('id_event', $event->id_event)->get();
        return view('Panel.dashboard.photos', compact('event', 'photogallery', 'videogallery'));
    }
}
