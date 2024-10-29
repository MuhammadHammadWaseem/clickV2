<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Event;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use Carbon\Carbon;
use App\Models\Meal;
use App\Models\Table;
use App\Models\Gift;
use App\Models\Seat;

class OperationController extends Controller
{
    public function attending(Request $request)
    {
        $guest = Guest::where('code', $request->route('guestcode'))->first();
        if ($guest) {
            $guest->opened = 2;
            $guest->save();
            $event = Event::where('id_event', $guest->id_event)->first();
            $group = $guest;
            $added = Guest::where('parent_id_guest', $guest->id_guest)->count();

            $lang = Session('applocale');

            if (array_key_exists($lang, Config::get('languages'))) {
                Session::put('applocale', $lang);
            }
            App::setLocale($lang);
            $isCorporate = DB::table('event_type')->where(['id_eventtype' => $event->type_id])->first()->corporate_event;
            if ($event) {
                return view('operations.attending', ['cardId' => $request->route("cardId"), 'guestCode' => $request->route("guestcode"), 'isCorporate' => $isCorporate])->with('guest', $guest)->with('event', $event)->with('group', $group)->with('added', $added);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function openedanswered(Request $request)
    {
        $guest = Guest::where('id_guest', $request->idguest)->first();
        if ($guest->opened != 2) {
            $guest->opened = $request->opened;
            $guest->save();
        }

        return 'ok';
    }

    public function showevent(Request $request)
    {
        $event = Event::findOrFail($request->idevent);
        $csrfToken = csrf_token();

        $eventType = DB::table('event_type')->where(["id_eventtype" => $event->type_id])->get();

        $userData = DB::table('users')->where(["id" => $event->id_user])->get();

        $current = Carbon::now();
        $dateNow = $current->format('Y-m-d');

        if ($userData[0]->trail == 1) {
            if ($userData[0]->trail_date > $dateNow) {
                $event->trail = $userData[0]->trail;
            } else {
                DB::table('users')->where(["id" => $event->id_user])->update(["trail" => 0]);
                $event->trail = 0;
            }
        } else {
            $event->trail = 0;
        }

        $event->serverDateNow = $current->format('Y-m-d H:i:s');

        $photogallery = PhotoGallery::where('id_event', $request->idevent)->get();
        $videogallery = VideoGallery::where('id_event', $request->idevent)->get();

        foreach ($photogallery as $photo) {
            if (strlen($photo->guestCode) > 0) {
                // dd($photo->guestCode);
                $guestName = Guest::where('code', $photo->guestCode)->first();
            } else {
                $photo->name = "MAIN";
            }
        }
        $event->photogallery = $photogallery;
        $event->videogallery = $videogallery;
        $event->isCouple = $eventType[0]->couple_event;
        $event->isCorporate = $eventType[0]->corporate_event;
        $event->csrfToken = $csrfToken;
        return $event;
    }

    public function mymembers(Request $request)
    {
        $members = Guest::where('mainguest', 0)->where('parent_id_guest', $request->idgroup)->get();
        $total = count($members);
        foreach ($members as $gm) {
            if ($gm->id_meal != 0)
                $gm->meal = Meal::where('id_meal', $gm->id_meal)->first();
        }
        foreach ($members as $gm) {
            if ($gm->id_table != 0) {
                $gm->table = Table::where('id_table', $gm->id_table)->first();
                $isSeats = DB::table('seats')->where(['id_guest' => $gm->id_guest])->first();
                if ($isSeats) {
                    $gm->seat = $isSeats->seat_name;
                }
            }
            $gm->total = $total;
        }
        return $members;
    }

    public function mygroup(Request $request)
    {
        $group = Guest::where('id_guest', $request->idgroup)->first();
        if ($group->id_meal != 0)
            $group->meal = Meal::where('id_meal', $group->id_meal)->first();
        if ($group->id_table != 0)
            $group->table = Table::where('id_table', $group->id_table)->first();
        $group->seat = DB::table('seats')->where(['id_guest' => $group->id_guest])->first();

        return $group;
    }

    public function showmeals(Request $request)
    {

        $meals = Meal::where('id_event', $request->idevent)->get();
        return $meals;
    }

    public function getTables(Request $request)
    {
        return DB::table('tables')->where(['id_event' => $request->idevent])->get();

    }

    public function editopguest(Request $request)
    {

        $guest = Guest::where('id_guest', $request->idguest)->first();
        if ($guest) {
            $guest->name = $request->nameguest;
            $guest->email = $request->emailguest ?? '';
            $guest->phone = $request->phoneguest ?? '';
            $guest->whatsapp = $request->whatsappguest ?? '';
            $guest->allergies = $request->allergiesguest ?? '';
            $guest->notes = $request->notes ?? '';
            if ($request->has('idmealguest') && $request->idmealguest != null) {
                $guest->id_meal = $request->idmealguest;
                $guest->opened = 2;
            }
            $guest->notes = $request->notesguest;
            if ($guest->mainguest)
                $guest->members_number = $request->membernumberguest;

            $guest->save();
            return 1;
        } else
            return 0;
    }

    public function getGuest(Request $request)
    {
        $guest = Guest::where('id_guest', $request->idguest)->first();
        if ($guest) {
            return $guest;
        } else
            return 0;
    }

    public function guestedit(Request $request, $id)
    {
        $guest = Guest::where('id_guest', $id)->first();
        if ($guest) {
            $guest->name = $request->nameguest;
            $guest->email = $request->emailguest;
            $guest->phone = $request->phoneguest;
            $guest->whatsapp = $request->whatsappguest;
            $guest->allergies = $request->allergies == 1 ? 1 : 0;
            $guest->id_meal = $request->idmealguest;
            $guest->notes = $request->notesguest;
            if ($request->has('membersNumber')) {
                $guest->members_number = $request->membersNumber;
            }
            $guest->save();
            return 1;
        }
        return 0;
    }

    public function GuestDecline(Request $request)
    {
        $guest = Guest::where('id_guest', $request->idguest)->first();
        if ($guest) {
            $guest->opened = null;
            $guest->declined = 1;
            $guest->checkin = null;
            $guest->save();
            return 1;
        }
        return 0;
    }

    public function confirmGuest(Request $request)
    {
        $guest = Guest::where('id_guest', $request->idguest)->first();
        if ($guest) {
            $guest->opened = 2;
            $guest->declined = null;
            $guest->checkin = null;
            $guest->save();
            return 1;
        }
        return 0;
    }

    public function delmemberattending(Request $request)
    {
        $guest = Guest::where('id_guest', $request->guestid)->first();
        if ($guest) {
            $guest->delete();
        } else
            return 0;
    }

    public function giftsuggestion(Request $request)
    {
        $guest = Guest::where('code', $request->route('guestcode'))->first();
        if ($guest) {

            $lang = $request->route("lang");

            if (array_key_exists($lang, Config::get('languages'))) {
                Session::put('applocale', $lang);
            }
            App::setLocale($lang);


            $event = Event::where('id_event', $guest->id_event)->first();
            if ($event) {
                $gifts = Gift::where('id_event', $event->id_event)->get();

                return view('operations.giftsuggestion')->with('gifts', $gifts)->with('event', $event)->with('guest', $guest);
            } else
                return redirect('/');
        } else
            return redirect('/');
    }

    public function showopgifts(Request $request)
    {
        $gifts = Gift::where('id_event', $request->idevent)->get();
        foreach ($gifts as $gift) {
            if ($gift->id_pick) {
                $gift->pick = Guest::where('id_guest', $gift->id_pick)->first();
            }
        }
        return $gifts;
    }

    public function pickgift(Request $request)
    {
        $gift = Gift::where('id_gift', $request->idpick)->first();
        if ($gift) {
            $gift->id_pick = $request->idguest;
            $gift->save();
            return 1;
        } else
            return 0;
    }

    public function checkin(Request $request)
    {
        $guest = Guest::where('code', $request->route('guestcode'))->first();


        if ($guest) {

            $lang = $request->route("lang");

            if (array_key_exists($lang, Config::get('languages'))) {
                Session::put('applocale', $lang);
            }
            App::setLocale($lang);

            $event = Event::where('id_event', $guest->id_event)->first();
            if ($event) {
                $guests = Guest::where('parent_id_guest', $guest->id_guest)->get();
                return view('operations.checkin')->with('guest', $guest)->with('guests', $guests)->with('event', $event);
            } else
                return redirect('/');
        } else
            return redirect('/');
    }

    public function showopguests(Request $request)
    {

        $guest = Guest::where('id_guest', $request->idguest)->first();
        if ($guest->id_table)
            $guest->table = Table::where('id_table', $guest->id_table)->first();
        if ($guest) {
            $guests = Guest::where('parent_id_guest', $guest->id_guest)->get();
            foreach ($guests as $g) {
                if ($g->id_table) {
                    $g->table = Table::where('id_table', $g->id_table)->first();
                }
                $seat = Seat::where('id_guest', $g->id_guest)->first();
                if ($seat) {
                    // If $seat exists, assign the value to $g->seat after replacing non-numeric characters
                    $g->seat = preg_replace('/[^0-9]/', '', $seat->seat_name);
                } else {
                    // If $seat does not exist, assign a default value or handle it as you prefer
                    $g->seat = 'No Seat Assigned';
                }
            }
            $GuestSeat = Seat::where('id_guest', $guest->id_guest)->first();
            $guest->childs = $guests;
            $guest->seat = isset($GuestSeat->seat_name) ? preg_replace('/[^0-9]/', '', $GuestSeat->seat_name) : '';

            return $guest;
        }
    }

    public function changecheck(Request $request)
    {
        $guest = Guest::where('id_guest', $request->idguest)->first();
        if ($guest) {
            if ($guest->checkin == 1){
                $guest->checkin = 0;
                $guest->save();
                return 0;
            }
            else{
                $guest->checkin = 1;
                $guest->save();
                return 1;
            }
        }
    }

    public function addphotos(Request $request)
    {
        $guest = Guest::where('code', $request->route('guestcode'))->first();
        if ($guest) {

            $lang = $request->route("lang");

            if (array_key_exists($lang, Config::get('languages'))) {
                Session::put('applocale', $lang);
            }
            App::setLocale($lang);

            $event = Event::where('id_event', $guest->id_event)->first();
            if ($event) {
                return view('operations.addphotos')->with('guest', $guest)->with('event', $event)->with('ack', 0);
            } else
                return redirect('/');
        } else
            return redirect('/');
    }
}
