<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Helpers\GeneralHelper;

class GiftSuggestion extends Controller
{
    // Fetch the list of gifts
    public function index(){
        $eventId = GeneralHelper::getEventId();
        $event = Event::where('id_event',$eventId)->select('transfer_link','transfer_type')->first();
        return view('Panel.dashboard.gift-suggestion',compact("event"));
    }
    public function show()
    {
        $eventId = GeneralHelper::getEventId();
        $gifts = Gift::where('id_event', $eventId)->get();
        return response()->json(['gifts' => $gifts]);
    }
    // Store a new gift suggestion
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        $eventId = GeneralHelper::getEventId();

        // Create the new gift
        Gift::create([
            'name' => $request->name,
            'link' => $request->link,
            'description' => $request->description,
            'id_event' => $eventId,
        ]);

        return response()->json(['message' => 'Gift added successfully!'], 200);
    }

    public function edit($id)
    {
        $gift = Gift::where('id_gift', $id)->first(); // Use first() to retrieve a single record
        return response()->json($gift);
    }


    // Edit a gift
    public function update(Request $request, $id)
{
    // dd($request);
    $request->validate([
        'name' => 'required|string|max:255',
        'link' => 'nullable|url', // Added validation for URL
        'description' => 'nullable|string',
    ]);
    // Find the gift by id_gift, or return an error response if not found
    $gift = Gift::where('id_gift', $request->id_gift)->first();
    if (!$gift) {
        return response()->json(['message' => 'Gift not found.'], 404);
    }

    // Update only the fillable fields
    // $gift->name =
    // $gift->update($request->only(['name', 'link', 'description']));
    $gift->name = $request->name;
    $gift->link = $request->link;
    $gift->description = $request->description;
    $gift->save();

    return response()->json(['message' => 'Gift updated successfully!'], 200);
}

public function savetransfer(Request $request)
{
    $event=Event::where('id_event',$request->eventId)->first();
    if($event){
        $event->transfer_type=$request->transfertype;
        $event->transfer_link=$request->transferlink;
        $event->save();
        return response()->json([
            'success' => true,
            'message' => "Updated Successfully"
        ]);
    }
    return response()->json([
        'success' => false,
        'message' => "Error"
    ]);
}

    // Delete a gift
    public function destroy($id)
    {
        $gift = Gift::where('id_gift',$id);
        $gift->delete();

        return response()->json(['message' => 'Gift deleted successfully!'], 200);
    }
}
