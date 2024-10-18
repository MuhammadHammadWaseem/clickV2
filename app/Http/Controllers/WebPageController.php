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

        $photogallery = PhotoGallery::where('id_event', $event->id_event)->get();
        $videogallery = VideoGallery::where('id_event', $event->id_event)->get();

        return view('Panel.dashboard.WebPage',compact('event','photogallery','videogallery'));
    }

    public function storeImages(Request $request)
    {
        if ($request->hasFile('gall')) {
            if (!file_exists('public/event-images/' . $request->idevent . '/photogallery')) {
                mkdir('public/event-images/' . $request->idevent . '/photogallery', 0777, true);
            }
            // dd($request->file('gall'), $request->idevent, $request->guestCode);

            foreach ($request->file('gall') as $photo) {
                // dd($request->file('gall'));
                if ($photo->isValid()) {
                    $photogallery = new Photogallery;
                    $photogallery->id_event = $request->idevent;
                    $photogallery->guestCode = $request->guestCode ?? null;
                    $photogallery->save();

                    $fileName = $photo->getClientOriginalName();
                    $photo->move(public_path('event-images/' . $request->idevent . '/photogallery'), $photogallery->id_photogallery . ".jpg");
                }
            }
            if (count($request->file('gall')) > 2) {
                session()->flash('success', 'Your Photos has been successfully uploaded! Enjoy the party!');
                return redirect()->back();
            } else {
                session()->flash('success', 'Your Photo has been successfully uploaded! Enjoy the party!');
                return redirect()->back();
            }
        }
    }
}
