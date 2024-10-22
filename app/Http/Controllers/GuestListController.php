<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Event;
use App\Models\Guest;
use App\Models\Table;
use App\Mail\GuestAttending;
use Illuminate\Http\Request;
use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class GuestListController extends Controller
{
    public function index() {
        $eventId = GeneralHelper::getEventId();

        // Use paginate directly to get the paginated results
        $meals = Meal::where('id_event', $eventId)->paginate(10, ['id_meal', 'name']);

        return view('Panel.dashboard.guest-list', compact('meals'));
    }

    public function newguest(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'whatsapp' => 'required|',
            'allergies' => 'required',
            'meal' => 'required|exists:meals,id_meal',
            'members' => 'required|integer|min:1',
            'notes' => 'nullable|string',
            'confirm' => 'required'
        ]);
        $count = Guest::where('parent_id_guest', $request->parentidguest)->count();
        $allowed = Guest::where('id_guest', $request->parentidguest)->first();
        if ($allowed) {
            if ($count < $allowed->members_number) {
                $guest = new Guest;
                $guest->titleGuest = $request->title;
                $guest->name = $request->name;

                if ($request->has('email')) {
                    $guest->email = $request->email;
                }
                if ($request->has('phone')) {
                    $guest->phone = $request->phone;
                }
                if ($request->has('whatsapp')) {
                    $guest->whatsapp = $request->whatsapp;
                }

                $guest->mainguest = $request->mainguest;
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

                if ($request->mainguest == 1) {
                    $guest->opened = null;
                } else {
                    $guest->opened = 2;
                }

                $guest->members_number = $request->members;

                if ($request->has('notes')) {
                    $guest->notes = $request->notes;
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
                $guest->email = $request->email;
            }
            if ($request->has('phone')) {
                $guest->phone = $request->phone;
            }
            if ($request->has('whatsapp')) {
                $guest->whatsapp = $request->whatsapp;
            }
            $guest->mainguest = $request->mainguest;
            $guest->parent_id_guest = $request->parentidguest;
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

        public function show(Request $request) {
            $eventId = GeneralHelper::getEventId();

            // Set the current page from the request or default to 1
            $currentPage = $request->input('page', 1);
            $perPage = 10; // Number of items per page

            $guests = Guest::where('id_event', $eventId)
                ->where(function ($query) {
                    $query->where('mainguest', 1)
                        ->orWhere('mainguest', null);
                })
                ->paginate($perPage, ['*'], 'page', $currentPage);

            foreach ($guests as $g) {
                $g->members = Guest::where('id_event', $eventId)->where('mainguest', 0)->where('parent_id_guest', $g->id_guest)->get();
                foreach ($g->members as $gm) {
                    if ($gm->id_meal != 0)
                        $gm->meal = Meal::where('id_meal', $gm->id_meal)->first();
                }
                foreach ($g->members as $gm) {
                    if ($gm->id_table != 0)
                        $gm->table = Table::where('id_table', $gm->id_table)->first();
                }
            }

            return response()->json([
                'guests' => $guests->items(),
                'totalPages' => $guests->lastPage(), // total number of pages
                'currentPage' => $guests->currentPage() // current page number
            ]);
        }

        public function edit($id)
        {
            $guest = Guest::find($id);

            if ($guest) {
                // Return a view or JSON response depending on your use case
                return response()->json($guest);
            }

            return response()->json(['message' => 'Guest not found'], 404);
        }


        public function update(Request $request)
        {
            $guest = Guest::where('id_guest', $request->idguest)->first();
            if ($guest) {
                $guest->name = $request->name;
                $guest->titleGuest = $request->title;
                $guest->email = $request->email;
                $guest->phone = $request->phone;
                $guest->whatsapp = $request->whatsapp;
                $guest->allergies =($request->allergies == "1") ? 1 : 0;
                $guest->id_meal = $request->meal;
                $guest->notes = $request->notes;
                $guest->members_number = $request->members;
                $guest->opened = ($request->confirm == "1") ? 1 : 0;

                $guest->save();
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
                return response()->json(["guests" => $events]);;
            }
        }
