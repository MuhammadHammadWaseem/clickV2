<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use Illuminate\Support\Facades\Auth;
use App\Models\WebsiteSetting;
use App\Models\EventType;

class WebPageController extends Controller
{
    public function index(Request $request, $id)
    {
        $event = Event::with('eventType')->where('id_event', $id)
            ->where('id_user', Auth::id())
            ->first();

        $photogallery = PhotoGallery::where('id_event', $event->id_event)->get();
        $videogallery = VideoGallery::where('id_event', $event->id_event)->get();
        $WebsiteSetting = WebsiteSetting::where('id_event', $id)->first();
        $eventType = EventType::where('id_eventtype', $event->type_id)->first();

        return view('Panel.dashboard.WebPage', compact('event', 'photogallery', 'videogallery','WebsiteSetting','eventType'));
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

    public function storeVideos(Request $request)
    {
        $event = Event::where('id_event', $request->idevent)->first();
        if ($event) {
            // Validate video file if it exists
            if ($request->hasFile('vid')) {
                $video = $request->file('vid');
                $maxSize = 15 * 1024 * 1024; // 15 MB in bytes

                if ($video->getSize() > $maxSize) {
                    return response()->json(['error' => 'The video is too large to upload. Maximum size allowed is 15 MB.'], 422);
                }

                if (!file_exists('public/event-images/' . $request->idevent . '/videos')) {
                    mkdir('public/event-images/' . $request->idevent . '/videos', 0777, true);
                }

                $filename = time() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('event-images/' . $request->idevent . '/videos'), $filename);

                // Save the video path to the event

                $videogallery = new VideoGallery;
                $videogallery->id_event = $request->idevent;
                $videogallery->guest_code = $request->guest_code ?? null;
                $videogallery->video = $filename;
                $videogallery->save();

                $uploadedVideo = 'event-images/' . $request->idevent . '/videos/'. $videogallery->video;
                $id = $videogallery->id;

                return response()->json([
                    'success' => 'Videos uploaded successfully!',
                    'videos' => $uploadedVideo,
                    'id' => $id
                ]);
            }

            return redirect()->back();
        } else
            return response()->json(['error' => 'Event not found.'], 404);
    }
    
    public function deleteVideo(Request $request)
    {
        $photogallery = VideoGallery::where('id', $request->id)->first();
        if ($photogallery && $photogallery->id_event == $request->idevent) {
            // Convert to absolute path using public_path helper
            $videoPath = public_path('event-images/' . $request->idevent . '/videos/' . $photogallery->video);

            // Delete the record from the database
            $photogallery->delete();

            // Check if the file exists and delete it
            if (file_exists($videoPath)) {
                unlink($videoPath);
                return response()->json(['success' => 'Video deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'File does not exist'], 404);
            }
        }

        return response()->json(['error' => 'Video not found or unauthorized action'], 404);
    }

    
    public function storeUsersImages(Request $request)
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

            return redirect()->back()->with(['success' => 'Image Uploaded Successfully!']);
        } else {
            return redirect()->back()->withErrors('No image was uploaded.');
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
            }

            return response()->json(['success' => 'Photo deleted successfully!']);
        }

        return response()->json(['error' => 'Photo not found or unauthorized!'], 403);
    }

    public function storeCerImage(Request $request)
    {
        $event = Event::where('id_event', $request->idevent)->first();

        if ($request->hasFile('cerimage')) {
            $eventFolder = public_path('event-images/' . $request->idevent);

            // Create directory if it doesn't exist
            if (!file_exists($eventFolder)) {
                mkdir($eventFolder, 0777, true);
            }

            $cerImage = $request->file('cerimage');
            $cerImage->move($eventFolder, "cerimg.jpg");

            $event->cerimg = '/event-images/' . $request->idevent . '/' . "cerimg.jpg";
            $event->save();

            return response()->json(['success' => 'Ceremony Image uploaded successfully!', 'img' => $event->cerimg]);
        } else {
            return response()->json(['error' => 'No files uploaded.'], 400);
        }
    }
    public function storeRecImage(Request $request)
    {
        $event = Event::where('id_event', $request->idevent)->first();

        if ($request->hasFile('recimage')) {
            $eventFolder = public_path('event-images/' . $request->idevent);

            // Create directory if it doesn't exist
            if (!file_exists($eventFolder)) {
                mkdir($eventFolder, 0777, true);
            }

            $cerImage = $request->file('recimage');
            $cerImage->move($eventFolder, "recimg.jpg");

            $event->recimg = '/event-images/' . $request->idevent . '/' . "recimg.jpg";
            $event->save();

            return response()->json(['success' => 'Reception Image uploaded successfully!', 'img' => $event->recimg]);
        } else {
            return response()->json(['error' => 'No files uploaded.'], 400);
        }
    }

    public function storeParImage(Request $request)
    {
        $event = Event::where('id_event', $request->idevent)->first();

        if ($request->hasFile('parimage')) {
            $eventFolder = public_path('event-images/' . $request->idevent);

            // Create directory if it doesn't exist
            if (!file_exists($eventFolder)) {
                mkdir($eventFolder, 0777, true);
            }

            $cerImage = $request->file('parimage');
            $cerImage->move($eventFolder, "parimg.jpg");

            $event->parimg = '/event-images/' . $request->idevent . '/' . "parimg.jpg";
            $event->save();

            return response()->json(['success' => 'Reception Image uploaded successfully!', 'img' => $event->parimg]);
        } else {
            return response()->json(['error' => 'No files uploaded.'], 400);
        }
    }

    public function changeMainPhoto(Request $request)
    {
        $event = Event::where('id_event', $request->idevent)->first();

        if ($request->file('mainimage')) {
            $eventFolder = public_path('event-images/' . $request->idevent);

            // Create directory if it doesn't exist
            if (!file_exists($eventFolder)) {
                mkdir($eventFolder, 0777, true);
            }

            // Delete the old image if it exists
            if (!empty($event->mainimage)) {
                $oldImagePath = public_path($event->mainimage);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Remove the old image
                }
            }   
            
            // Store the uploaded image
            $image = $request->file('mainimage');
            $filename = time() . '.' . $image->extension();
            $image->move($eventFolder, $filename);  // Move to the correct directory

            // Update the event's main image
            $event->mainimage = '/event-images/' . $request->idevent . '/' . $filename;
            $event->save();

            return redirect()->back()->with(['success' => 'Main Image Updated Successfully!']);
        } else {
            return redirect()->back()->withErrors('No image was uploaded.');
        }
    }


}
