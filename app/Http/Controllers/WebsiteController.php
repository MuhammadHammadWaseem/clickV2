<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use App\Models\EventType;
use App\Models\WebsiteSetting;

class WebsiteController extends Controller
{
    public function index($id)
    {
        $event = Event::where('id_event', $id)->first();
        $photogallery = PhotoGallery::where('id_event', $id)->get();
        $videogallery = VideoGallery::where('id_event', $id)->paginate(4);
        $eventType = EventType::where('id_eventtype', $event->type_id)->first();
        $WebsiteSetting = WebsiteSetting::where('id_event', $id)->first();

        if ($event) {
            return view('Panel.dashboard.Website')->with('event', $event)->with('photogallery', $photogallery)->with('eventType', $eventType)->with('videogallery', $videogallery)->with('WebsiteSetting', $WebsiteSetting);
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


    public function update(Request $request, $id)
    {
        // Validate input colors
        $request->validate([
            'bride_name_color' => 'nullable|string|max:7',
            'groom_name_color' => 'nullable|string|max:7',
            'and_symbol_color' => 'nullable|string|max:7',
            'event_date_color' => 'nullable|string|max:7',
            'font_style' => 'nullable|string|max:50',
            'event_name_color' => 'nullable|string|max:50',
        ]);

        // Find the existing event by id, or create a new one if not found
        $event = WebsiteSetting::updateOrCreate(
            ['id_event' => $id], // Find by the ID, or create a new record if not found
            [
                'id_event' => $id, // Save the id_event in the database
                'bride_name_color' => $request->input('bride_name_color'),
                'groom_name_color' => $request->input('groom_name_color'),
                'and_symbol_color' => $request->input('and_symbol_color'),
                'event_date_color' => $request->input('event_date_color'),
                'font_style' => $request->input('font_style'),
                'event_name_color' => $request->input('event_name_color'),
            ]
        );

        return redirect()->back()->with('success', 'Event colors updated or created successfully.');
    }



}
