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

        return view('Panel.dashboard.WebPage', compact('event', 'photogallery', 'videogallery'));
    }

    public function storeImages(Request $request)
    {
        $request->validate([
            'gall.*' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048', // Adjust file size as needed
        ]);

        if ($request->hasFile('gall')) {
            $eventFolder = public_path('event-images/' . $request->idevent . '/photogallery');

            // Create directory if it doesn't exist
            if (!file_exists($eventFolder)) {
                mkdir($eventFolder, 0777, true);
            }

            $newImages = [];

            foreach ($request->file('gall') as $photo) {
                if ($photo->isValid()) {
                    // Create a new Photogallery record
                    $photogallery = new PhotoGallery;
                    $photogallery->id_event = $request->idevent;
                    $photogallery->guestCode = $request->guestCode ?? null;
                    $photogallery->save();

                    // Store image ID in the newImages array
                    $newImages[] = $photogallery->id_photogallery;

                    // Move uploaded file to the appropriate folder
                    $photo->move($eventFolder, $photogallery->id_photogallery . ".jpg");
                }
            }

            return response()->json(['success' => 'Photos uploaded successfully!', 'photos' => $newImages]);
        } else {
            return response()->json(['error' => 'No files uploaded.'], 400);
        }
    }

    public function deleteImages(Request $request, $id)
    {
        // Find the photogallery entry by its ID
        $photogallery = PhotoGallery::where('id_photogallery', $id)->first();

        if ($photogallery && $photogallery->id_event == $request->eventId) {
            // Delete the database record
            $photogallery->delete();

            // Prepare the full path to the image
            $imagePath = public_path('event-images/' . $request->eventId . '/photogallery/' . $id . '.jpg');

            // Check if the file exists and delete it
            if (file_exists($imagePath)) {
                unlink($imagePath);
            } else {
                return response()->json(['error' => 'File does not exist!'], 404);
            }

            return response()->json(['success' => 'Photo deleted successfully!']);
        }

        return response()->json(['error' => 'Photo not found or unauthorized!'], 403);
    }


}
