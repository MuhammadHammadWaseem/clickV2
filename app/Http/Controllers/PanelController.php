<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Validator;

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
        $events = Event::where('id_user', Auth::id())->paginate(10);

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
        $event->boolcerimony = 0;
        $event->ceraddress = "";
        $event->cercountry = "";
        $event->cerprovince = "";
        $event->cercity = "";
        $event->cerpc = "";
        $event->certime = "";
        $event->cerdesc = "";
        $event->cerimg = "";
        $event->boolreception = 0;
        $event->recaddress = "";
        $event->reccountry = "";
        $event->recprovince = "";
        $event->reccity = "";
        $event->recpc = "";
        $event->rectime = "";
        $event->recdesc = "";
        $event->recimg = "";
        $event->boolparty = 0;
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
}
