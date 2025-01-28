<?php

namespace App\Http\Controllers;

use Session;
use Validator;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\EventType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Helpers\GeneralHelper;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;

class PanelController extends Controller
{
    // Helper function to create custom pagination
    private function customPagination($events)
    {
        $pagination = '';
        $currentPage = $events->currentPage();
        $lastPage = $events->lastPage();

        // Previous Button
        $pagination .= '<li>';
        if ($currentPage > 1) {
            $pagination .= '<a href="#" class="pagination-btn" data-page="' . ($currentPage - 1) . '">&lt;</a>';
        } else {
            $pagination .= '<a href="#" class="pagination-btn disabled">&lt;</a>';
        }
        $pagination .= '</li>';

        // Page Numbers
        for ($i = 1; $i <= $lastPage; $i++) {
            $pagination .= '<li>';
            if ($i == $currentPage) {
                $pagination .= '<a href="#" class="pagination-btn active" data-page="' . $i . '">' . str_pad($i, 2, '0', STR_PAD_LEFT) . '</a>';
            } else {
                $pagination .= '<a href="#" class="pagination-btn" data-page="' . $i . '">' . str_pad($i, 2, '0', STR_PAD_LEFT) . '</a>';
            }
            $pagination .= '</li>';
        }

        // Next Button
        $pagination .= '<li>';
        if ($currentPage < $lastPage) {
            $pagination .= '<a href="#" class="pagination-btn" data-page="' . ($currentPage + 1) . '">&gt;</a>';
        } else {
            $pagination .= '<a href="#" class="pagination-btn disabled">&gt;</a>';
        }
        $pagination .= '</li>';

        return $pagination;
    }

    public function index(Request $request)
    {
        $eventList = EventType::get();
        $events = Event::where('id_user', Auth::id())->orderBy('id_event', 'desc')->paginate(10);
        if ($request->ajax()) {
            // Pass the current page number to the view to highlight it
            $pagination = $this->customPagination($events);

            return response()->json([
                'events' => $events->items(),
                'pagination' => $pagination,
                'currentPage' => $events->currentPage(),  // Pass the current page number
            ]);
        }
        return view('Panel.index', compact('eventList', 'events'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:25',
            'date' => 'required|date',
            'type' => 'required|integer|exists:event_type,id_eventtype',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                "message" => "Validation failed",
                "success" => false,
                "errors" => $validator->errors()
            ], 422);
        }
        $eventType = EventType::where(["id_eventtype" => $request->type])->get();
        $event = new Event;
        $event->type = $eventType[0]->title;
        $event->type_id = $request->type;
        $event->name = $request->title;
        $event->date = $request->date;
        $event->code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 20);
        $event->id_user = Auth::id();
        $event->coupon_code = "";
        $event->bridefname = "";
        $event->bridelname = "";
        $event->bridesummary = "";
        $event->groomfname = "";
        $event->groomlname = "";
        $event->groomsummary = "";
        $event->summary = "";
        $event->boolcerimony = 1;
        $event->ceraddress = "";
        $event->cercountry = "";
        $event->cerprovince = "";
        $event->cercity = "";
        $event->cerpc = "";
        $event->certime = "";
        $event->cerdesc = "";
        $event->cerimg = "";
        $event->boolreception = 1;
        $event->recaddress = "";
        $event->reccountry = "";
        $event->recprovince = "";
        $event->reccity = "";
        $event->recpc = "";
        $event->rectime = "";
        $event->recdesc = "";
        $event->recimg = "";
        $event->boolparty = 1;
        $event->parname = "";
        $event->paraddress = "";
        $event->parcountry = "";
        $event->parprovince = "";
        $event->parcity = "";
        $event->parpc = "";
        $event->partime = "";
        $event->pardesc = "";
        $event->parimg = "";
        $event->imggroom = "";
        $event->imgbride = "";
        $event->imgplan = "";
        $event->mainimage = "";
        $event->transfer_type = "";
        $event->transfer_link = "";
        $event->paid = 0;
        $event->save();
        return response()->json([
            "message" => "Event Created Successfully",
            "success" => true,
            "event" => $event
        ], 200);

    }

    public function generalInfos($id)
    {
        $event = Event::with('eventType')->where('id_event', $id)->where('id_user', Auth::id())->first();
        if ($event) {
            // Store event ID in the session
            GeneralHelper::setEventId($id);
            $event->date = Carbon::parse($event->date)->format('Y-m-d\TH:i');
            return view('Panel.dashboard.generalinfo', compact('event'));
        } else {
            return redirect()->route('panel.index')->with('error', 'Event not found.');
        }
    }
    public function updateEvent(Request $request, $id)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'event' => 'required|string|max:25',
            'event_date' => 'required|date',
            'groom_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bride_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                "message" => "Validation failed",
                "success" => false,
                "errors" => $validator->errors()
            ], 422);
        }

        // Find the event belonging to the logged-in user
        $event = Event::where('id_event', $id)->first();

        // Check if the event was found
        if (!$event) {
            return response()->json([
                "message" => "Event not found or you are not authorized.",
                "success" => false,
            ], 404);
        }

        // Fetch the event type title
        $eventType = EventType::where('id_eventtype', $event->type_id)->first();
        if (!$eventType) {
            return response()->json([
                "message" => "Event type not found.",
                "success" => false,
            ], 404);
        }
        // Update the event data
        $event->type = $eventType->title;
        $event->type_id = $eventType->id_eventtype;
        $event->name = $request->event;
        $event->date = $request->event_date;

        // Update the remaining fields (setting defaults where necessary)
        $event->code = $event->code ?? substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 20);
        $event->coupon_code = $request->coupon_code ?? $event->coupon_code;
        $event->bridefname = $request->bridefname ?? $event->bridefname;
        $event->bridelname = $request->bridelname ?? $event->bridelname;
        $event->bridesummary = $request->bridesummary ?? $event->bridesummary;
        $event->groomfname = $request->groomfname ?? $event->groomfname;
        $event->groomlname = $request->groomlname ?? $event->groomlname;
        $event->groomsummary = $request->groomsummary ?? $event->groomsummary;
        $event->summary = $request->story ?? $event->summary;
        $event->boolcerimony = $request->boolcerimony ?? $event->boolcerimony;
        $event->ceraddress = $request->ceraddress ?? $event->ceraddress;
        $event->cercountry = $request->cercountry ?? $event->cercountry;
        $event->cerprovince = $request->cerprovince ?? $event->cerprovince;
        $event->cercity = $request->cercity ?? $event->cercity;
        $event->cerpc = $request->cerpc ?? $event->cerpc;
        $event->certime = $request->certime ?? $event->certime;
        $event->cerdesc = $request->cerdesc ?? $event->cerdesc;
        $event->boolreception = $request->boolreception ?? $event->boolreception;
        $event->recaddress = $request->recaddress ?? $event->recaddress;
        $event->reccountry = $request->reccountry ?? $event->reccountry;
        $event->recprovince = $request->recprovince ?? $event->recprovince;
        $event->reccity = $request->reccity ?? $event->reccity;
        $event->recpc = $request->recpc ?? $event->recpc;
        $event->rectime = $request->rectime ?? $event->rectime;
        $event->recdesc = $request->recdesc ?? $event->recdesc;
        $event->boolparty = $request->boolparty ?? $event->boolparty;
        $event->parname = $request->parname ?? $event->parname;
        $event->paraddress = $request->paraddress ?? $event->paraddress;
        $event->parcountry = $request->parcountry ?? $event->parcountry;
        $event->parprovince = $request->parprovince ?? $event->parprovince;
        $event->parcity = $request->parcity ?? $event->parcity;
        $event->parpc = $request->parpc ?? $event->parpc;
        $event->partime = $request->partime ?? $event->partime;
        $event->pardesc = $request->pardesc ?? $event->pardesc;

        // Handle groom image upload

        if ($request->hasFile('groom_img')) {
            // Define the directory where the image will be saved
            $directory = public_path('event-images/' . $event->id_event);

            // Check if the directory exists, if not, create it with appropriate permissions
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            // Define the filename as groom.jpg
            $filename = 'groom.jpg';

            // Check if groom.jpg already exists in the folder and delete it
            $oldImagePath = $directory . '/' . $filename;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the old image
            }

            // Get the uploaded file
            $file = $request->file('groom_img');

            // Move the new file to the directory with the name groom.jpg
            $file->move($directory, $filename);

            // Optionally, save the image path in the database (assuming you have a 'groom_img' column in the 'events' table)
            $event->imggroom = 'event-images/' . $event->id_event . '/' . $filename;
        }

        if ($request->hasFile('bride_img')) {
            // Define the directory where the image will be saved
            $directory = public_path('event-images/' . $event->id_event);

            // Check if the directory exists, if not, create it with appropriate permissions
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            // Define the filename as groom.jpg
            $filename = 'bride.jpg';

            // Check if groom.jpg already exists in the folder and delete it
            $oldImagePath = $directory . '/' . $filename;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the old image
            }

            // Get the uploaded file
            $file = $request->file('bride_img');

            // Move the new file to the directory with the name groom.jpg
            $file->move($directory, $filename);

            // Optionally, save the image path in the database (assuming you have a 'bride_img' column in the 'events' table)
            $event->imgbride = 'event-images/' . $event->id_event . '/' . $filename;
        }

        // Save the updated event
        $event->save();

        return response()->json([
            "message" => "Event updated successfully",
            "success" => true,
            "event" => $event
        ], 200);
    }
    public function deleteEvent($id)
    {
        // Validate the ID to ensure it exists
        $event = Event::where('id_event', $id);
        if (!$event) {
            return response()->json([
                "message" => "Event not found.",
                "success" => false
            ], 404);
        }

        // Delete the event
        $event->delete();
        
        Session::forget('event_id');

        return response()->json([
            "message" => "Event deleted successfully",
            "success" => true
        ], 200);
    }

}
