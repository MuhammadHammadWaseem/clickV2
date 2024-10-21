<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use App\Models\EventType;

class WebsiteController extends Controller
{
    public function index($id)
    {
        $event = Event::where('id_event', $id)->first();
        $photogallery = PhotoGallery::where('id_event', $id)->get();
        $videogallery = VideoGallery::where('id_event', $id)->paginate(4);
        $eventType = EventType::where('id_eventtype', $event->type_id)->first();

        if ($event) {
            return view('Panel.dashboard.Website')->with('event', $event)->with('photogallery', $photogallery)->with('eventType', $eventType)->with('videogallery', $videogallery);
        } else {
            return redirect('/');
        }
    }

    public function showGallery(Request $request)
    {
        $event = Event::where('id_event', $request->route('id'))->first();
        $photogallery = PhotoGallery::where('id_event', $request->route('id'))->get();
        $videogallery = VideoGallery::where('id_event', $request->route('id'))->get();
        $eventType = EventType::where('id_eventtype', $event->type_id)->first();

        return view('Panel.dashboard.showGallery')->with('event', $event)->with('photogallery', $photogallery)->with('eventType', $eventType)->with('videogallery', $videogallery);
    }
}
