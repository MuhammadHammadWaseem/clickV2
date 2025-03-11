<?php

namespace App\Http\Controllers;

use QRcode;
use App\Models\Card;
use App\Models\Meal;
use App\Models\Event;
use App\Models\Guest;
use App\Models\Table;
use App\Models\GuestOption;
use App\Mail\GuestAttending;
use Illuminate\Http\Request;
use App\Helpers\GeneralHelper;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use App\Mail\Invitaion\EventsFrench;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Invitaion\EventsEnglish;
use App\Mail\Invitaion\CorporateFrench;
use App\Mail\Invitaion\CorporateEnglish;
use PDF;
class GuestListController extends Controller
{
    public function index()
    {
        $eventId = GeneralHelper::getEventId();
        $card = Card::where('id_event', $eventId)->latest()->first();
        $meals = Meal::where('id_event', $eventId)->paginate(10, ['id_meal', 'name']);
        return view('Panel.dashboard.guest-list', compact('meals', 'card'));
    }

    public function newguest(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable',
            'whatsapp' => 'nullable',
            'allergies' => 'boolean',
            'meal' => 'nullable|exists:meals,id_meal',
            'members' => 'nullable',
            'notes' => 'nullable|string'
        ], [
            'members.required' => 'Please specify the number of members invited.',
            'members.integer' => 'The number of members must be a valid number.',
            'members.min' => 'The number of members must be at least 1.'
        ]);

        // Check if at least one of phone, email, or whatsapp is provided
        if (empty($request->phone) && empty($request->email) && empty($request->whatsapp)) {
            return response()->json(['success' => false, 'message' => 'At least one of phone, email, or WhatsApp must be provided.']);
        }

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Custom validation for duplicate name, email, and phone in the same event
        $duplicateGuest = Guest::where('id_event', $request->idevent)
            ->where(function ($query) use ($request) {
                // Check for duplicates only if the field is not empty or null
                if ($request->name) {
                    $query->where('name', $request->name);
                }
                if ($request->email) {
                    $query->orWhere('email', $request->email);
                }
                if ($request->phone) {
                    $query->orWhere('phone', $request->phone);
                }
                if ($request->whatsapp) {
                    $query->orWhere('whatsapp', $request->whatsapp);
                }
            })
            ->exists();

        if ($duplicateGuest) {
            return response()->json(['success' => false, 'message' => 'Duplicate guest found. The name, email, or phone number already exists for this event.']);
        }

        $count = Guest::where('parent_id_guest', $request->parentidguest)->count();
        $allowed = Guest::where('id_guest', $request->parentidguest)->first();
        if ($allowed) {
            if ($count < $allowed->members_number) {
                $guest = new Guest;
                $guest->titleGuest = $request->title;
                $guest->name = $request->name;

                if ($request->has('email')) {
                    $guest->email = $request->email ?? null;
                }
                if ($request->has('phone')) {
                    $guest->phone = $request->phone ?? null;
                }
                if ($request->has('whatsapp')) {
                    $guest->whatsapp = $request->whatsapp ?? null;
                }

                $guest->mainguest = $request->mainguest ?? 0;
                $guest->parent_id_guest = $request->parentidguest;
                $guest->id_event = $request->idevent;
                $guest->allergies = ($request->allergies == 'Yes') ? 1 : 0;

                if ($request->has('meal')) {
                    $guest->id_meal = $request->meal;
                    $guest->opened = 2;
                }

                if ($request->confirm == 'Yes') {
                    $guest->opened = 2;
                }
                
                $guest->opened = null;

                $guest->members_number = $request->members ?? 0;

                if ($request->has('notes')) {
                    $guest->notes = $request->notes ?? '';
                }

                $guest->code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 20);

                $guest->save();
            } else {
                return response()->json(['error' => 'Max number of guests reached']);
            }
        } else {
            $guest = new Guest;
            $guest->titleGuest = $request->title;
            $guest->name = $request->name;

            if ($request->has('email')) {
                $guest->email = $request->email ?? null;
            }
            if ($request->has('phone')) {
                $guest->phone = $request->phone ?? null;
            }
            if ($request->has('whatsapp')) {
                $guest->whatsapp = $request->whatsapp ?? null;
            }
            $guest->mainguest = $request->mainguest ?? 1;
            $guest->parent_id_guest = $request->parentidguest ?? 0;
            $guest->id_event = $request->idevent;
            $guest->allergies = ($request->allergies == '1') ? 1 : 0;
            $guest->opened = null;
            if ($request->has('meal')) {
                $guest->id_meal = $request->meal;
                $guest->opened = 2;
            }

            if ($request->confirm == '1') {
                $guest->opened = 2;
            }

            $guest->members_number = $request->members;

            if ($request->has('notes')) {
                $guest->notes = $request->notes;
            }

            $guest->code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 20);

            $guest->save();
        }

        if ($request->parentidguest != "") {
            $GuestEmail = Guest::where('id_guest', $request->parentidguest)->first();
            $meal = Meal::where('id_meal', $guest->id_meal)->first();
            $event = Event::where('id_event', $request->idevent)->first();

            if ($GuestEmail && $GuestEmail->email) {
                Mail::to($GuestEmail->email)->send(new GuestAttending($guest, $event, $meal));
            }
        }

        return response()->json(['success' => true, 'message' => 'Guest added successfully!']);
    }



    public function show(Request $request)
    {
        // dd($request->all());
        $eventId = GeneralHelper::getEventId();

        if ($request->filter == "1") {
            $guests = Guest::where('id_event', $eventId)->where('mainguest', 1)->get();

            foreach ($guests as $g) {
                $g->members = Guest::where('id_event', $eventId)->where('mainguest', 0)->where('parent_id_guest', $g->id_guest)->get();

                foreach ($g->members as $gm) {
                    if ($gm->id_meal != 0) {
                        $gm->meal = Meal::where('id_meal', $gm->id_meal)->first();
                    }
                    if ($gm->id_table != 0) {
                        $gm->table = Table::where('id_table', $gm->id_table)->first();
                    }
                }

                if ($g->id_meal != 0) {
                    $g->meal = Meal::where('id_meal', $g->id_meal)->first();
                }
                if ($g->id_table != 0) {
                    $g->table = Table::where('id_table', $g->id_table)->first();
                }
            }

            return response()->json([
                'guests' => $guests,
            ]);
        }

        if ($request->filter == "checked-in") {
            $guests = Guest::where('id_event', $eventId)->where('mainguest', 1)->get();

            foreach ($guests as $g) {
                $g->members = Guest::where('id_event', $eventId)->where('mainguest', 0)->where('parent_id_guest', $g->id_guest)->get();
                $CheckedIn = $g->checkin;

                foreach ($g->members as $gm) {
                    if ($gm->checkin == 1) {
                        $CheckedIn = 1;
                    }
                    if ($gm->id_meal != 0) {
                        $gm->meal = Meal::where('id_meal', $gm->id_meal)->first();
                    }
                    if ($gm->id_table != 0) {
                        $gm->table = Table::where('id_table', $gm->id_table)->first();
                    }
                }

                $g->CheckedIn = $CheckedIn;

                if ($g->id_meal != 0) {
                    $g->meal = Meal::where('id_meal', $g->id_meal)->first();
                }
                if ($g->id_table != 0) {
                    $g->table = Table::where('id_table', $g->id_table)->first();
                }
            }

            return response()->json([
                'guests' => $guests,
            ]);
        }

        if ($request->filter == "declined") {

            $guests = Guest::where('id_event', $eventId)->where('mainguest', 1)->get();
            $isDeclined = 0;
            foreach ($guests as $g) {
                $g->members = Guest::where('id_event', $eventId)->where('mainguest', 0)->where('parent_id_guest', $g->id_guest)->get();

                $isDeclined = $g->declined;
                foreach ($g->members as $gm) {
                    if ($gm->declined == 1) {
                        $isDeclined = 1;
                    }
                    if ($gm->id_meal != 0)
                        $gm->meal = Meal::where('id_meal', $gm->id_meal)->first();
                }
                foreach ($g->members as $gm) {
                    if ($gm->id_table != 0)
                        $gm->table = Table::where('id_table', $gm->id_table)->first();
                }
                $g->isDeclined = $isDeclined;
            }
            foreach ($guests as $g) {
                if ($g->id_meal != 0)
                    $g->meal = Meal::where('id_meal', $g->id_meal)->first();
            }
            foreach ($guests as $g) {
                if ($g->id_table != 0)
                    $g->table = Table::where('id_table', $g->id_table)->first();
            }
            return response()->json([
                'guests' => $guests,
            ]);
        }

        if ($request->filter == "attending") {
            $guests = Guest::where('id_event', $eventId)
                ->where('mainguest', 1)
                ->where('opened', 2)
                ->get();
            foreach ($guests as $g) {
                // Fetch members associated with the main guest
                $g->members = Guest::where('id_event', $eventId)
                    ->where('mainguest', 0)
                    ->where('parent_id_guest', $g->id_guest)
                    ->get();

                // Initialize the new column
                $g->hasOpenedTwo = 0;

                if ($g->opened == 2) {
                    $g->guestOpened = 1;
                } else {
                    $g->guestOpened = 0;
                }

                foreach ($g->members as $gm) {
                    // Check if any member's 'opened' number is equal to 2
                    if ($gm->opened == 2) {
                        // If found, set the new column to true
                        $g->hasOpenedTwo = 1;
                        // Break the loop as we only need to find one member with 'opened' equal to 2
                        break;
                    }
                }
                foreach ($g->members as $gm) {
                    if ($gm->id_meal != 0)
                        $gm->meal = Meal::where('id_meal', $gm->id_meal)->first();
                }
                foreach ($g->members as $gm) {
                    if ($gm->id_table != 0)
                        $gm->table = Table::where('id_table', $gm->id_table)->first();
                }

                // Update properties for the main guest
                $g->isDeclined = $g->checkin;
                $g->CheckedIn = $g->declined;
                $g->Attending = $g->declined != 1 && $g->checkin != 1;
            }

            // Fetch meal and table information for each guest
            foreach ($guests as $g) {
                if ($g->id_meal != 0)
                    $g->meal = Meal::where('id_meal', $g->id_meal)->first();
            }
            foreach ($guests as $g) {
                if ($g->id_table != 0)
                    $g->table = Table::where('id_table', $g->id_table)->first();
            }

            return response()->json([
                'guests' => $guests,
            ]);
        }

        if ($request->filter == "not-open") {
            $guests = Guest::where('id_event', $eventId)->where('mainguest', 1)->whereNull('declined')->whereNull('opened')->get();
            foreach ($guests as $g) {
                $NotConfim = 0;
                $g->members = Guest::where('id_event', $eventId)->where('mainguest', 0)->where('parent_id_guest', $g->id_guest)->whereNull('declined')->whereNull('opened')->get();

                if ($g->opened) {

                    $g->NotConfim = 1;
                } else {
                    $g->NotConfim = 0;
                }

                foreach ($g->members as $gm) {
                    if ($gm->opened) {

                        $gm->NotConfim = 1;
                    } else {
                        $gm->NotConfim = 0;
                    }

                    if ($gm->id_meal != 0)
                        $gm->meal = Meal::where('id_meal', $gm->id_meal)->first();
                }


                foreach ($g->members as $gm) {
                    if ($gm->id_table != 0)
                        $gm->table = Table::where('id_table', $gm->id_table)->first();
                }
            }
            foreach ($guests as $g) {
                if ($g->id_meal != 0)
                    $g->meal = Meal::where('id_meal', $g->id_meal)->first();
            }
            foreach ($guests as $g) {
                if ($g->id_table != 0)
                    $g->table = Table::where('id_table', $g->id_table)->first();
            }
            return response()->json([
                'guests' => $guests,
            ]);
        }


        if ($request->filter == "opened") {
            $guests = Guest::where('id_event', $eventId)->where('mainguest', 1)->where('opened', 1)->get();

            foreach ($guests as $g) {
                $NotConfim = 0;
                $g->members = Guest::where('id_event', $eventId)->where('mainguest', 0)->where('parent_id_guest', $g->id_guest)->where('opened', 1)->get();

                if ($g->opened) {

                    $g->NotConfim = 1;
                } else {
                    $g->NotConfim = 0;
                }

                foreach ($g->members as $gm) {
                    if ($gm->opened) {

                        $gm->NotConfim = 1;
                    } else {
                        $gm->NotConfim = 0;
                    }

                    if ($gm->id_meal != 0)
                        $gm->meal = Meal::where('id_meal', $gm->id_meal)->first();
                }


                foreach ($g->members as $gm) {
                    if ($gm->id_table != 0)
                        $gm->table = Table::where('id_table', $gm->id_table)->first();
                }
            }
            foreach ($guests as $g) {
                if ($g->id_meal != 0)
                    $g->meal = Meal::where('id_meal', $g->id_meal)->first();
            }
            foreach ($guests as $g) {
                if ($g->id_table != 0)
                    $g->table = Table::where('id_table', $g->id_table)->first();
            }
            return response()->json([
                'guests' => $guests,
            ]);
        }

        if ($request->filter == "a-to-z") {
            $guests = Guest::where('id_event', $eventId)->where('mainguest', 1)
                ->orderBy('name', 'asc')->get();
            $CheckedIn = 0;
            foreach ($guests as $g) {
                $g->members = Guest::where('id_event', $eventId)->where('mainguest', 0)->where('parent_id_guest', $g->id_guest)
                    ->orderBy('name', 'asc')->get();

                $CheckedIn = $g->checkin;

                foreach ($g->members as $gm) {
                    if ($gm->checkin == 1) {
                        $CheckedIn = 1;
                    }
                    if ($gm->id_meal != 0)
                        $gm->meal = Meal::where('id_meal', $gm->id_meal)->first();
                }
                foreach ($g->members as $gm) {
                    if ($gm->id_table != 0)
                        $gm->table = Table::where('id_table', $gm->id_table)->first();
                }
                $g->CheckedIn = $CheckedIn;
            }
            foreach ($guests as $g) {
                if ($g->id_meal != 0)
                    $g->meal = Meal::where('id_meal', $g->id_meal)->first();
            }
            foreach ($guests as $g) {
                if ($g->id_table != 0)
                    $g->table = Table::where('id_table', $g->id_table)->first();
            }
            return response()->json([
                'guests' => $guests,
            ]);
        }

        if ($request->filter == "z-to-a") {
            $guests = Guest::where('id_event', $eventId)->where('mainguest', 1)
                ->orderBy('name', 'desc')->get();
            $CheckedIn = 0;
            foreach ($guests as $g) {
                $g->members = Guest::where('id_event', $eventId)->where('mainguest', 0)->where('parent_id_guest', $g->id_guest)
                    ->orderBy('name', 'desc')->get();

                $CheckedIn = $g->checkin;

                foreach ($g->members as $gm) {
                    if ($gm->checkin == 1) {
                        $CheckedIn = 1;
                    }
                    if ($gm->id_meal != 0)
                        $gm->meal = Meal::where('id_meal', $gm->id_meal)->first();
                }
                foreach ($g->members as $gm) {
                    if ($gm->id_table != 0)
                        $gm->table = Table::where('id_table', $gm->id_table)->first();
                }
                $g->CheckedIn = $CheckedIn;
            }
            foreach ($guests as $g) {
                if ($g->id_meal != 0)
                    $g->meal = Meal::where('id_meal', $g->id_meal)->first();
            }
            foreach ($guests as $g) {
                if ($g->id_table != 0)
                    $g->table = Table::where('id_table', $g->id_table)->first();
            }
            return response()->json([
                'guests' => $guests,
            ]);
        }

    }

    public function edit($id)
    {
        $guest = Guest::find($id);

        if ($guest) {
            // Return a view or JSON response depending on your use case
            $guest['members'] = Guest::where('parent_id_guest', $guest->id_guest)->get();
            return response()->json($guest);
        }

        return response()->json(['message' => 'Guest not found'], 404);
    }


    public function update(Request $request)
    {
        // dd($request->all());
        $guest = Guest::where('id_guest', $request->idguest)->first();
        $members = Guest::where('parent_id_guest', $request->idguest)->get();

        if ($request->members < $members->count()) {
            return response()->json(
                [
                    "error" => "Cannot set number of members below existing members."
                ]
            );
        }

        if ($guest) {
            $guest->name = $request->name;
            $guest->titleGuest = $request->title;
            $guest->email = $request->email ?? '';
            $guest->phone = $request->phone ?? '';
            $guest->whatsapp = $request->whatsapp ?? '';
            $guest->allergies = ($request->allergies == "1") ? 1 : 0;
            $guest->id_meal = $request->meal ?? 0;
            $guest->notes = $request->notes ?? '';
            $guest->members_number = $request->members ?? 0;
            $guest->opened = ($request->confirm == "1") ? 2 : 0;
            $guest->save();
            
            if($guest->opened == 1 || $guest->opened == 2){
                $guest->declined = 0;
                $guest->save();
            }
            return response()->json(["message" => "Guest added successfully!"]);
        }
        return response()->json(["message" => "Guest added successfully!"]);
    }

    public function importGuestFromOtherEvent(Request $request)
    {

        $allevents = $request->allguests;
        foreach ($allevents as $ievent) {
            // dd($ievent['id_guest']);
            // Check if 'guests' exists and is not empty
            // if (isset($ievent['guests']) && !empty($ievent['guests'])) {
            //     foreach ($ievent['guests'] as $iguest) {
            //         if (array_key_exists('selected', $iguest) && $iguest['selected'] == 1) {
            $guest = new Guest;
            $guest->name = $ievent['name'];
            $guest->phone = $ievent['phone'] ?? '';
            $guest->whatsapp = $ievent['whatsapp'] ?? '';
            $guest->email = $ievent['email'] ?? '';
            $guest->id_event = $request['idevent'];
            $guest->allergies = $ievent['allergies'];
            $guest->mainguest = 1;
            $guest->parent_id_guest = 0;
            $guest->members_number = $ievent['members_number'];
            $guest->notes = $ievent['notes'] ?? '';
            $guest->code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 20);
            $guest->save();
        }
        //         }
        //     }
        // }
        return response()->json(["message" => "Guest added successfully!", "guests" => $allevents]);
    }

    public function allguests(Request $request)
    {
        $events = Event::where('id_user', Auth::id())->where('id_event', '!=', $request->idevent)->get();
        foreach ($events as $event)
            $event->guests = Guest::where('id_event', $event->id_event)->where('mainguest', 1)->get();
        return response()->json(["guests" => $events]);
    }

    // public function importFromCsvGuest(Request $request, $id)
    // {
    //     // Validate that the request has a file and it is a CSV
    //     $request->validate([
    //         'csv_file' => 'required|mimes:csv,txt',
    //     ]);

    //     // Get the uploaded file
    //     $file = $request->file('csv_file');

    //     // Open the file and read its contents
    //     if (($handle = fopen($file, 'r')) !== FALSE) {
    //         $header = null;
    //         $data = [];

    //         // Loop through the CSV file and extract rows
    //         while (($row = fgetcsv($handle, 1000, ";")) !== FALSE) {
    //             if (!$header) {
    //                 $header = $row; // Assuming first row is the header
    //             } else {
    //                 $data[] = array_combine($header, $row); // Combine header with data rows
    //             }
    //         }
    //         fclose($handle);

    //         // Insert guests into the database
    //         foreach ($data as $g) {
    //             $guest = new Guest();
    //             $guest->name = $g['name'];
    //             $guest->email = $g['email'];
    //             $guest->phone = $g['phone'];
    //             $guest->whatsapp = $g['whatsapp'];
    //             $guest->mainguest = 1;
    //             $guest->parent_id_guest = 0;
    //             $guest->notes = $g['notes'];
    //             $guest->id_event = $id;
    //             $guest->members_number = $g['nummembers'];
    //             $guest->code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 20);
    //             $guest->save();
    //         }

    //         return response()->json(["message" => "Guests imported successfully."]);
    //     }

    //     return response()->json(["error" => "Error processing the file."], 400);
    // }



    public function importFromCsvGuest(Request $request, $id)
    {
        // Validate that the request has a file and it is a CSV
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        // Get the uploaded file
        $file = $request->file('csv_file');

        // Open the file and read its contents
        if (($handle = fopen($file, 'r')) !== FALSE) {
            $header = null;
            $data = [];

            // Loop through the CSV file and extract rows
            while (($row = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if (!$header) {
                    $header = $row; // Assuming first row is the header
                } else {
                    $combined = array_combine($header, $row);
                    if ($combined) {
                        $data[] = $combined; // Only add if the combination was successful
                    }
                }
            }
            fclose($handle);

            // Insert guests into the database
            foreach ($data as $g) {
                $guest = new Guest();
                $guest->titleGuest = $g['title'] ?? null;
                $guest->name = $g['name'] ?? null;
                $guest->email = $g['email'] ?? null;
                $guest->phone = $g['phone'] ?? null;
                $guest->whatsapp = $g['whatsapp'] ?? null;
                $guest->mainguest = 1;
                $guest->parent_id_guest = 0;
                $guest->notes = $g['notes'] ?? null;
                $guest->id_event = $id;
                $guest->members_number = $g['nummembers'] ?? null;
                $guest->allergies = $g['allergies'] ?? null; // Add this line
                $guest->code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 20);

                // Only save if a name is provided
                if (!is_null($guest->name)) {
                    $guest->save();
                }
            }

            return response()->json(["message" => "Guests imported successfully."]);
        }

        return response()->json(["error" => "Error processing the file."], 400);
    }




    public function deleteGuest(Request $request)
    {
        // Check if guestid or guestIds is provided
        if (!$request->has('guestid') && !$request->has('guestIds')) {
            return response()->json(["error" => "Guest ID not provided"], 400);
        }

        // If a single guest ID is provided
        if ($request->has('guestid')) {
            $guest = Guest::where('id_guest', $request['guestid'])->first();

            // Check if guest exists
            if ($guest) {
                $event = Event::where('id_event', $request->idevent)->first();
                if ($event && $event->id_user == Auth::id()) {
                    // Delete child guests
                    Guest::where('parent_id_guest', $request->guestid)->delete();
                    // Delete the guest
                    $guest->delete();
                } else {
                    return response()->json(["error" => "Event not found"], 400);
                }
            } else {
                return response()->json(["error" => "Guest not found"], 400);
            }
        }
        // If multiple guest IDs are provided
        else {
            $guests = Guest::whereIn('id_guest', $request['guestIds'])->get();
            if ($guests->isEmpty()) {
                return response()->json(["error" => "Guests not found"], 400);
            }

            $event = Event::where('id_event', $request->idevent)->first();
            if ($event && $event->id_user == Auth::id()) {
                // Delete all guests
                foreach ($guests as $guest) {
                    // Delete child guests
                    Guest::where('parent_id_guest', $guest->id_guest)->delete();
                    // Delete the guest
                    $guest->delete();
                }
            } else {
                return response()->json(["error" => "Event not found"], 400);
            }
        }

        return response()->json(["success" => "Guests deleted successfully"], 200);
    }

    public function declineguest(Request $request)
    {
        // Check if no guest ID or guest IDs are provided
        if (!$request->has('guestid') && !$request->has('guestIds')) {
            return response()->json(["error" => "Guest ID not provided"], 400);
        }

        // If a single guest ID is provided
        if ($request->has('guestid')) {
            $guest = Guest::where('id_guest', $request->guestid)->first();

            if ($guest) {
                $event = Event::where('id_event', $request->idevent)->first();
                if ($event && $event->id_user == Auth::id()) {
                    // Update guest details
                    $guest->declined = 1;
                    $guest->opened = null;
                    $guest->checkin = null;
                    $guest->id_table = 0;
                    $guest->save();
                    return response()->json(["success" => "Guest declined successfully"], 200);
                } else {
                    return response()->json(["error" => "Event not found or access denied"], 400);
                }
            } else {
                return response()->json(["error" => "Guest not found"], 400);
            }
        }
        // If multiple guest IDs are provided
        else {
            $guests = Guest::whereIn('id_guest', $request->guestIds)->get();

            if ($guests->isEmpty()) {
                return response()->json(["error" => "Guests not found"], 400);
            }

            $event = Event::where('id_event', $request->idevent)->first();
            if ($event && $event->id_user == Auth::id()) {
                // Update all guests
                foreach ($guests as $guest) {
                    // Update guest details
                    $guest->declined = 1;
                    $guest->opened = null;
                    $guest->checkin = null;
                    $guest->id_table = 0;
                    $guest->save();
                }
                return response()->json(["success" => "All guests declined successfully"], 200);
            } else {
                return response()->json(["error" => "Event not found or access denied"], 400);
            }
        }
    }
    public function undeclineguest(Request $request)
    {
        // Check if no guest ID or guest IDs are provided
        if (!$request->has('guestid') && !$request->has('guestIds')) {
            return response()->json(["error" => "Guest ID not provided"], 400);
        }

        // If a single guest ID is provided
        if ($request->has('guestid')) {
            $guest = Guest::where('id_guest', $request->guestid)->first();

            if ($guest) {
                $event = Event::where('id_event', $request->idevent)->first();
                if ($event && $event->id_user == Auth::id()) {
                    // Update guest details
                    $guest->declined = 0;
                    $guest->opened = 2;
                    $guest->save();
                    return response()->json(["success" => "Guest declined successfully"], 200);
                } else {
                    return response()->json(["error" => "Event not found or access denied"], 400);
                }
            } else {
                return response()->json(["error" => "Guest not found"], 400);
            }
        }
        // If multiple guest IDs are provided
        else {
            $guests = Guest::whereIn('id_guest', $request->guestIds)->get();

            if ($guests->isEmpty()) {
                return response()->json(["error" => "Guests not found"], 400);
            }

            $event = Event::where('id_event', $request->idevent)->first();
            if ($event && $event->id_user == Auth::id()) {
                // Update all guests
                foreach ($guests as $guest) {
                    // Update guest details
                    $guest->declined = 0;
                    $guest->opened = 2;
                    $guest->save();
                }
                return response()->json(["success" => "All guests declined successfully"], 200);
            } else {
                return response()->json(["error" => "Event not found or access denied"], 400);
            }
        }
    }

    public function getGuestqr(Request $request)
    {
        $id = $request->idevent;
        $date = $request->reservationDate;
        $guests = Guest::where('id_event', $id)->where('mainguest', 1)->get();
        $date = Carbon::parse($date);
        $eventDate = $date->format('F j, Y');

        // require_once 'C:\xampp8.2\htdocs\clickV2\app\Http\Controllers\phpqrcode/qrlib.php';
        require_once base_path('app/Http/Controllers/phpqrcode/qrlib.php');
        // require_once '/var/www/html/clickinvitation/app/Http/Controllers/phpqrcode/qrlib.php';

        if ($guests->isNotEmpty()) {
            $guestData = [];
            $card = Card::where('id_event', $id)->first();
            $lang = session('applocale', 'en');

            if ($card && $card->id_card) {
                foreach ($guests as $g) {
                    $guest_code = $g->code;
                    $guest_name = $g->name;
                    $guest_name_without_spaces = str_replace(' ', '', $guest_name);
                    $url = url('/cardInvitations/' . $card->id_card . '/' . $guest_code . '/' . $guest_name_without_spaces . '/' . $lang);
                    $qrcode = 'images/' . $g->id_guest . $guest_code . '.png';

                    if (!file_exists($qrcode)) {
                        \QRcode::png($url, $qrcode, 'H', 4, 4);
                    }

                    $base64QrCode = base64_encode(file_get_contents($qrcode));
                    $guestData[] = [
                        'name' => $guest_name,
                        'qr_code_base64' => $base64QrCode,
                        'eventDate' => $eventDate,
                    ];
                }
            }

            set_time_limit(600);
            $pdf = PDF::loadView('qrPdf', ['guests' => $guestData, 'eventDate' => $eventDate]);
            // $pdf = PDF::loadView('qrPdf', ['guests' => $guestData, 'eventDate' => $eventDate])->setOptions(['isRemoteEnabled' => true]);
            return $pdf->download('tables.pdf');
        } else {
            return response()->json(['message' => 'No guests found.']);
        }
    }



    // Save buttons when send invitaiton
    public function saveOptions(Request $req)
    {
        // Get checked options from formData
        $options = $req->formData;

        // Process each guest ID
        $guests = isset($req->guestid) ? [$req->guestid] : $req->guestIds; // Handle single or multiple guests

        foreach ($guests as $guest) {
            // Delete existing guest options if they exist
            $dd = GuestOption::where('event_id', $req->idevent)->where('guest_id', $guest)->delete();

            // Create a new entry with the form options
            GuestOption::create([
                'event_id' => $req->idevent ?? 0,
                'guest_id' => $guest ?? 0,
                'gift' => isset($options['gift-suggestion']) ? 1 : 0,
                'checkin' => isset($options['at-reception-check-in']) ? 1 : 0,
                'photos' => isset($options['upload-your-photo']) ? 1 : 0,
                'website' => isset($options['go-to-the-website']) ? 1 : 0,
                'attending' => isset($options['attending']) ? 1 : 0,
                'rsp' => isset($options['learn-how-RSVP-works']) ? 1 : 0,
            ]);
        }

        return response()->json('Options Create Successfully');
    }



    public function sendinvitations(Request $request)
    {
        $options = $request->formData;
        $guests = isset($request->guestid) ? [$request->guestid] : $request->guestIds;
        if ($guests) {
            foreach ($guests as $guest) {

                $guest = Guest::where('id_guest', $guest)->first();
                $event = Event::where('id_event', $request->idevent)->first();
                $cardId = Card::select("*")->where([['id_event', "=", $event->id_event]])->orderBy('id_card', 'desc')->first();

                $guestName = str_replace(" ", "+", $guest['name']);

                $guestTable = DB::table('tables')->where('id_table', $guest['id_table'])->first();
                $lang = App::getLocale();

                if ($request->formData && isset($request->formData['emailCheck'])) {
                    if ($guest['email']) {

                        // if (!file_exists('/images/' . $guest['id_guest'] . $guest['code'] . '.png')) {
                        //     //Generate QR Code if not exists
                        //     $lang = Session('applocale');
                        //     if ($lang == "en") {
                        //         $url = url('/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guest['name'] . '/' . 'en');
                        //     } else if ($lang == "fr") {
                        //         $url = url('/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guest['name'] . '/' . 'fr');
                        //     } else {
                        //         $url = url('/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guest['name'] . '/' . 'en');
                        //     }
                        //     require_once 'C:\xampp 7.4.1\htdocs\Clickinvitation\app\Http\Controllers/phpqrcode/qrlib.php';
                        //     // require_once '/var/www/html/clickinvitation/app/Http/Controllers/phpqrcode/qrlib.php';

                        //     $path = 'images/';
                        //     $qrcode = $path . $guest['id_guest'] . $guest['code'] . '.png';
                        //     if (!file_exists($qrcode)) {
                        //         \QRcode::png($url, $qrcode, 'H', 4, 4);
                        //     };
                        //     //Generate QR Code if not exists
                        // }

                        // $formattedDate = Carbon::parse($event->date)->format('m/d/Y, g:i A');
                        // $formattedDate = Carbon::parse($event->date)->setTimezone('+2')->format('j F, Y H:i');
                        $dataEvent = $event->date;
                        $ConverteddataEvent = strtotime($dataEvent);
                        $formattedDate = date('m/d/Y, g:i A', $ConverteddataEvent);
                        // $formattedDate = $event->date;

                        // $timestamp = strtotime($dateString);
                        // $formattedDate = date('m/d/Y, g:i A', $timestamp);
                        // $formattedDate = date('m/d/Y, g:i A', $timestamp);

                        $cerTime = $event->certime;
                        $ConvertedCerTime = strtotime($cerTime);
                        $formattedCerTime = date('m/d/Y, g:i A', $ConvertedCerTime);
                        // $formattedCerTime = date("g:i A l, F j, Y", $ConvertedCerTime);


                        $recTime = $event->rectime;
                        $date = Carbon::parse($recTime);
                        $formattedRecTime = $date->format('m/d/Y, g:i A');

                        // $recTime = $event->rectime;
                        // $ConvertedRecTime = strtotime($recTime);
                        // $formattedRecTime = date("g:i A l, F j, Y", $ConvertedRecTime);
                        $content = [
                            'guest' => $guest,
                            'event' => $event,
                            'cardId' => $cardId ? $cardId->toArray() : null,
                            'guestTable' => $guestTable,
                            'formattedDate' => $formattedDate,
                            'formattedCerTime' => $formattedCerTime,
                            'formattedRecTime' => $formattedRecTime,
                            'lang' => $lang,
                        ];
                        if ($lang == 'en') {
                            if ($event->type == "CORPORATE") {
                                $body = '';
                                if ($event->type == "CORPORATE") {
                                    if ($guestTable !== null) {

                                    } else {

                                    }
                                }
                                // Mail::to('talharao997az@gmail.com')->send(new CorporateEnglish($content));
                            } else {
                                if ($event->type == "CORPORATE") {
                                    if ($guestTable !== null) {

                                    } else {
                                        // Handle the case where $guestTable is null
                                    }
                                }
                                // Mail::to('talharao997az@gmail.com')->send(new EventsEnglish($content));
                            }
                        } elseif ($lang == 'fr') {

                            if ($event->type == "CORPORATE") {
                                $body = '';

                                // Mail::to('talharao997az@gmail.com')->send(new CorporateFrench($content));
                            } else {
                                $body = '';
                                // Mail::to('talharao997az@gmail.com')->send(new EventsFrench($content));
                            }
                        }

                        // echo $body . " - " . $guest['email'] . " - " . $event->name . " - " . $cardId['msgTitle'];
                        try {
                            // Send Mail
                            if ($lang === 'en') {
                                $mailClass = $event->type === "CORPORATE" ? CorporateEnglish::class : EventsEnglish::class;
                            } else {
                                $mailClass = $event->type === "CORPORATE" ? CorporateFrench::class : EventsFrench::class;
                            }
                            Mail::to($guest['email'])->send(new $mailClass($content));
                        } catch (\Exception $e) {
                            Log::error('Mail sending failed: ' . $e->getMessage());
                        }
                    }
                }

                //---------- SMS ----------------------
                if ($request->formData && isset($request->formData['smsCheck'])) {
                    if ($guest['phone'] && $guest['phone'] != null && $guest['parent_id_guest'] == 0) {
                        if ($event->type == "CORPORATE") {
                            if ($lang == 'en') {
                                $params = ['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] . "\n\n" . 'You Got Invitation For ' . $event->name . ' ' . config('app.url') . '/' . 'cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang];
                            } elseif ($lang == 'fr') {
                                $params = ['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] . "\n\n" . 'Vous avez une invitation pour' . $event->name . ' ' . config('app.url') . '/' . 'cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang];
                            } else {
                                $params = ['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] . "\n\n" . 'You Got Invitation For ' . $event->name . ' ' . config('app.url') . '/' . 'cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang];
                            }
                        } else {

                            if ($lang == 'en') {
                                $params = ['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] . "\n\n" . 'You Got Invitation For ' . $event->name . ' ' . $event->type . '  ' . "\n\n" . config('app.url') . '/' . 'cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang];
                            } elseif ($lang == 'fr') {
                                $params = ['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] . "\n\n" . 'Vous avez une invitation pour' . $event->name . ' ' . $event->type . '  ' . "\n\n" . config('app.url') . '/' . 'cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang];
                            } else {
                                $params = ['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] . "\n\n" . 'You Got Invitation For ' . $event->name . ' ' . $event->type . '  ' . "\n\n" . config('app.url') . '/' . 'cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang];
                            }
                        }
                        //$params=['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => 'You Got Invitation For '.$event->name.' '.$event->type.' https://clickinvitation.com/cardInvitation/'.$cardId['id_card'].'/'.$guest['code'].'/'.$lang];
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, 'https://api.twilio.com/2010-04-01/Accounts/AC1875f6f40ede2df24999ef0db6d666da/Messages.json');
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_USERPWD, 'AC1875f6f40ede2df24999ef0db6d666da:ea0f387de51d18742c5114d0232433c8');
                        $data = curl_exec($ch);
                        curl_close($ch);

                        //return $data;


                        //return 'ok';



                        /*$client = new \Goutte\Client(\Symfony\Component\HttpClient\HttpClient::create(['timeout' => 60]));

                        $queryParams = [
                            'foo=1',
                            'bar=2',
                            'bar=3',
                            'baz=4',
                        ];

                        $content = implode('&', $queryParams);

                        $crawler = $client->request('POST', 'https://api.twilio.com/2010-04-01/Accounts/ACe58142d20bb65d447e449ce1169014fe/Messages.json',
                            array(
                                'MessagingServiceSid' => 'MG3285904c6c26862be5b4a38164177db8',
                                'To' => '+393334850264',
                                'Body' => 'hi thereeee'
                            )
                        );

                        print_r($client->getResponse());*/
                    }
                }


                //---------- WHATSAPP ----------------------
                if ($request->formData && isset($request->formData['whatsappCheck'])) {
                    if ($guest['whatsapp'] && $guest['whatsapp'] != 0 && $guest['parent_id_guest'] == 0) {
                        $url = "https://graph.facebook.com/v16.0/112950588286835/messages";

                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_URL, $url);
                        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization:Bearer EAAJNk9TfhxABOyJZAdwno3UohLjPQfAxVXp6y9b4ZCtnd9VVyPzaRryMSXYYSTABPOXYahVXQoxY4a8vX9GWj2RkbH8tTLC605ZAbJ3x63xu6Bz3tvXmxWxJEd2spIpKcgpiwOdESoWZAga3VZCeKX5praY08hbpcA74YGm8uHJjMy7fcCUdhyHAZD', 'Content-Type: application/json'));
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        $data3 = [

                            "type" => "body",
                            "parameters" => [
                                "type" => "$event->name . ' ' . $event->type",
                                "text" => "Mr Jibran"
                            ]
                        ];

                        $data2 = [
                            "name" => "sample_issue_resolution",
                            "language" => ["code" => "en_US"],
                            "components" => $data3
                        ];

                        /*
                        components:{
                        type:body,
                        parameters {
                            type:text,
                            text:Mr Jibran
                        }}"

                        */

                        $data = array(
                            "messaging_product" => "whatsapp",
                            "to" => $guest['whatsapp'],
                            "type" => "template",
                            "preview_url" => true,
                            "template" => array(
                                "name" => "clickinvitation_wedding_template_2",
                                "language" => array("code" => $lang),
                                "components" => array(
                                    [
                                        "type" => "body",
                                        "parameters" => array(
                                            [
                                                "type" => "text",
                                                "text" => $event->name . ' ' . $event->type
                                            ],
                                            [
                                                "type" => "text",
                                                "text" => config('app.url') . '/' . 'cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang
                                            ],
                                            [
                                                "type" => "text",
                                                "text" => $cardId['msgTitle'] . " "
                                            ]
                                        )
                                    ]
                                )
                            )
                        );



                        $fields_string = json_encode($data);
                        //echo $fields_string;
                        echo $fields_string;
                        echo "<br/>";
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);

                        $resp = curl_exec($curl);
                        curl_close($curl);

                        echo $resp;
                    }
                }
            }
        }
    }
}
