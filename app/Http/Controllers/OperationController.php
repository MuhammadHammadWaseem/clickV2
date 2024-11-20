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
use Illuminate\Support\Facades\Mail;
use App\Mail\GuestAttending;
use App\Models\Card;
use App\Mail\MealInvitation;
use App\Helpers\GeneralHelper;

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
            $guest->email = $request->emailguest ?? '';
            $guest->phone = $request->phoneguest ?? '';
            $guest->whatsapp = $request->whatsappguest ?? '';
            $guest->allergies = $request->allergies == 1 ? 1 : 0;
            $guest->id_meal = $request->idmealguest ?? '';
            $guest->notes = $request->notesguest ?? '';
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
            if ($guest->checkin == 1) {
                $guest->checkin = 0;
                $guest->save();
                return 0;
            } else {
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

    public function newguest(Request $request)
    {
        $count = Guest::where('parent_id_guest', $request->parentidguest)->count();
        $allowed = Guest::where('id_guest', $request->parentidguest)->first();
        if ($allowed) {

            if ($count < $allowed->members_number) {
                $guest = new Guest;
                $guest->titleGuest = $request->titleGuest;
                $guest->name = $request->nameguest;
                if ($request->has('emailguest'))
                    $guest->email = $request->emailguest;
                if ($request->has('phoneguest'))
                    $guest->phone = $request->phoneguest;
                if ($request->has('whatsappguest'))
                    $guest->whatsapp = $request->whatsappguest;
                $guest->mainguest = $request->mainguest;
                $guest->parent_id_guest = $request->parentidguest;
                $guest->id_event = $request->idevent;
                $guest->allergies = $request->allergiesguest ? 1 : 0;
                if ($request->has('idmealguest')) {
                    $guest->id_meal = $request->idmealguest;
                    $guest->opened = 2;
                }
                if ($request->confirmGuest && $request->confirmGuest == 1) {
                    $guest->opened = 2;
                }
                if ($request->mainguest == 1) {
                    $guest->opened = null;
                } else {
                    $guest->opened = 2;
                }
                $guest->members_number = $request->membernumberguest;
                if ($request->has('notesguest'))
                    $guest->notes = $request->notesguest;
                $guest->code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 20);

                $guest->save();
            } else {
                return response()->json(['error' => 'Max number of guests reached']);
            }
        } else {
            $guest = new Guest;
            $guest->titleGuest = $request->titleGuest;
            $guest->name = $request->nameguest;
            if ($request->has('emailguest'))
                $guest->email = $request->emailguest;
            if ($request->has('phoneguest'))
                $guest->phone = $request->phoneguest;
            if ($request->has('whatsappguest'))
                $guest->whatsapp = $request->whatsappguest;
            $guest->mainguest = $request->mainguest;
            $guest->parent_id_guest = $request->parentidguest;
            $guest->id_event = $request->idevent;
            $guest->allergies = $request->allergiesguest ? 1 : 0;
            $guest->opened = null;
            if ($request->has('idmealguest')) {
                $guest->id_meal = $request->idmealguest;
                $guest->opened = 2;
            }
            if ($request->confirmGuest && $request->confirmGuest == 1) {
                $guest->opened = 2;
            }
            $guest->members_number = $request->membernumberguest;
            if ($request->has('notesguest'))
                $guest->notes = $request->notesguest;
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


        return 1;
    }

    public function sendWhatsapp(Request $req)
    {

        $guest = DB::table('guests')->where('id_guest', $req->guestID)->first();
        $cardId = DB::table('cards')->where('id_card', $req->eventID)->first();
        $event = DB::table('events')->where('id_event', $cardId->id_event)->first();
        $lang = App::getLocale();

        $url = "https://graph.facebook.com/v16.0/112950588286835/messages";

        if (strlen($guest->whatsapp) > 0) {
            $guestName = str_replace(" ", "+", $guest->name);

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization:Bearer EAAJNk9TfhxABOyqSschCHIXhUyZBeJqurIW8ZBtjTZBYWOLCqnCrW8morXKZCK9aZBhTLc7XMKYxMTZBCKV85NoToguo5bNq5J88SFWyJEulKZCnX9jndDeN6p4ZB7Qr9HtVlG65pEZCBmqKXsxVNK5mv0HemfAOcg1MmCv9KRSAWZAiLwH4eWWW357MoZD', 'Content-Type: application/json'));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $data3 = [

                "type" => "body",
                "parameters" => [
                    "type" => "text",
                    "text" => ""
                ]
            ];

            $data2 = [
                "name" => "sample_issue_resolution",
                "language" => ["code" => "en_US"],
                "components" => $data3
            ];


            $data = array(
                "messaging_product" => "whatsapp",
                "to" => $guest->whatsapp,
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
                                    "text" => 'https://clickinvitation.com/cardInvitations/' . $cardId->id_card . '/' . $guest->code . '/' . $guestName . '/' . $lang
                                ],
                                [
                                    "type" => "text",
                                    "text" => $cardId->msgTitle . " "
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
        }
    }

    public function sendEmail(Request $req)
    {
        $guest = DB::table('guests')->where('id_guest', $req->guestID)->first();
        $cardId = DB::table('cards')->where('id_card', $req->eventID)->first();
        $event = DB::table('events')->where('id_event', $cardId->id_event)->first();
        $lang = App::getLocale();

        if (strlen($guest->email) > 0) {
            $guestName = str_replace(" ", "+", $guest->name);

            $dateString = $event->date;
            $timestamp = strtotime($dateString);
            $formattedDate = date("l, F j, Y", $timestamp);

            $cerTime = $event->certime;
            $ConvertedCerTime = strtotime($cerTime);
            $formattedCerTime = date("g:i A l, F j, Y", $ConvertedCerTime);


            $recTime = $event->rectime;
            $ConvertedRecTime = strtotime($recTime);
            $formattedRecTime = date("g:i A l, F j, Y", $ConvertedRecTime);

            if ($lang == 'en') {
                $body = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Document</title>
                </head>
                <body style="background: #fff!important;">
                    <br><br>


                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td align="center" style="padding:0 10px;color:#777777"><br>
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:650px">
                                        <tbody>
                                            <tr>
                                                <td align="center" valign="top">
                                                    <table width="100%" cellpadding="0" bgcolor="white!important" cellspacing="0"
                                                        style="background-color:white!important;width:100%;border-radius:10px;border:1px solid #e8e8e8;border-collapse:separate">
                                                        <tbody>
                                                        <tr>
                                                                <td
                                                                    style="background-color:#5a5a5a;text-align:center;padding:10px 15px;border-radius:10px 10px 0px 0px">
                                                                    <table width="100%" cellpadding="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td valign="top" style="color:#ffffff"><img
                                                                                        src="https://clickinvitation.com//assets/images/logo/logoNewWhite.png"
                                                                                        alt="Click Invitation" style="vertical-align:middle; width: 125px;"
                                                                                        class="CToWUd" data-bit="iit"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:0 15px 0 15px;font-family:"Open Sans",Helvetica,Arial;font-size:14px; text-align:center;">
                                                                    <br>
                                                                    <p style="font-size:16px;color:#333333;text-align:center">
                                                                        ' . $event->groomfname . ' &amp; ' . $event->bridefname . ' sent you an invitation for</p>
                                                                    <p style="font-size:24px;color:#333333;text-align:center">
                                                                        Wedding of ' . $event->groomfname . ' &amp; ' . $event->bridefname . '</p>
                                                                    <p style="font-size:14px;text-align:center">' . $formattedDate . '</p>
                                                                    <p style="margin-top:20px"></p>
                                                                    <p style="text-align:center">
                                                                    <a href="' . env('APP_URL') . 'cardInvitations/' . $cardId->id_card . '/' . $guest->code . '/' . $guest->name . '/' . $lang . '"
                                                                    style="text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                                    target="_blank"
                                                                    onmouseover="this.style.backgroundColor=\'#333333\'; this.style.boxShadow=\'0 0 5px rgba(0, 0, 0, 0.5)\';"
                                                                    onmouseout="this.style.backgroundColor=\'#242424\'; this.style.boxShadow=\'none\';">Open
                                                                    Invitation</a>
                                                                    </p>
                                                                    <p style="text-align:center"><a
                                                                            href="' . env('APP_URL') . 'cardInvitations/' . $cardId->id_card . '/' . $guest->code . '/' . $guest->name . '/' . $lang . '"
                                                                            target="_blank"><img
                                                                                src="' . asset('card-images') . '/' . $event->id_event . '.png"
                                                                                border="0" style="margin-bottom:20px;max-width:100%"
                                                                                class="CToWUd" data-bit="iit"></a>
                                                                    </p>
                                                                    <p style="font-style:italic;font-size:13px;text-align:center">
                                                                        This email is personalized for you. Please do not forward.</p> <br />

                                                                    <p style="font-style:italic;font-size:13px;text-align:center">
                                                                    <a href="' . env('APP_URL') . 'check-in/' . $cardId->id_card . '/' . $guest->code . '/' . $lang . '" style="margin-left:5px;color:#2bb573;text-decoration:none" target="_blank">
                                                                    Check In</a>
                                                                    </p>
                                                                    <table width="70%" cellpadding="0" cellspacing="0"
                                                                        style="margin:0 auto;text-align:center;margin-bottom:10px;border-top:1px solid #ebe9e9;font-size:14px;color:#777777">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <p style="font-weight:bold;margin:15px 5px 5px 5px">
                                                                                        Ceremony</p>
                                                                                    <p style="margin:5px">' . $event->ceraddress . ', ' . $event->cercity . ', ' . $event->cercountry . ', ' . $event->cerprovince . ', ' . $event->cerpc . '<a
                                                                                            href="' . $event->cerAddressLink . '"
                                                                                            style="margin-left:5px;color:#2bb573;text-decoration:none"
                                                                                            target="_blank"
                                                                                            data-saferedirecturl="' . $event->cerAddressLink . '">(View
                                                                                            Map)</a></p>
                                                                                    <p style="margin:5px"><span
                                                                                            style="white-space:nowrap">' . $formattedCerTime . '</span></p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table width="100%" cellpadding="0" cellspacing="0"
                                                                        style="margin:0 auto;text-align:center;border-top:1px solid #ebe9e9;background:#383838;font-size:14px;color:white;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <p style="font-weight:bold;margin:15px 5px 5px 5px">Reception</p>
                                                                                    <p style="margin:5px">' . $event->recaddress . ', ' . $event->reccity . ', ' . $event->reccountry . ', ' . $event->recprovince . ', ' . $event->recpc . '<a
                                                                                            href="' . $event->recAddressLink . '"
                                                                                            style="margin-left:5px;color:#2bb573;text-decoration:none"
                                                                                            target="_blank"
                                                                                            data-saferedirecturl="' . $event->recAddressLink . '">(View
                                                                                            Map)</a></p>
                                                                                    <p style="margin:5px"><span
                                                                                            style="white-space:nowrap"> ' . $formattedRecTime . '</span></p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td
                                                                    style="background-color:#777;text-align:center;padding:10px 15px;border-radius:0 0 10px 10px">
                                                                    <table width="100%" cellpadding="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td valign="top" style="color:#ffffff">Powered
                                                                                    by&nbsp;&nbsp;&nbsp;<img
                                                                                        src="https://clickinvitation.com//assets/images/logo/logoNewWhite.png"
                                                                                        alt="Click Invitation" style="vertical-align:middle; width: 115px;"
                                                                                        class="CToWUd" data-bit="iit"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td
                                                                    style="padding-top:10px;padding-bottom:20px;text-align:center;line-height:2;color:#777777;font-size:12px">
                                                                    Copyright © 2024 ClickInvitation. All rights reserved.<br>
                                                                    +1 (438) 303-9948<br>
                                                                    <a href="mailto:Info@Clickinvitation.Com"
                                                                        target="_blank">Info@Clickinvitation.Com</a> <a
                                                                        href="https://clickinvitation.com/contact" target="_blank">
                                                                        clickinvitation.com/contact</a><a></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <br>

                </body>
                </html>';
            } elseif ($lang == 'fr') {
                $body = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Document</title>
                </head>
                <body style="background:#fff;">
                    <br><br>


                    <table align="center" style="background:white; width: 595px ; border: 2px solid #663399; border-radius:20px;">
                        <tr>
                            <td>
                                <table width="595"  align="center" style="background:white; text-align:center; border-radius:20px;">
                                    <tr>
                                        <td><img moz-do-not-send="false" src="https://clickinvitation.com/assets/newimages/Group%201.svg" alt="Event masterplan" height="32"></td>

                                    </tr>
                                </table>
                                <table width="595"  cellpadding="20"  style="background:white;font-size:16px; color:#222; font-family: Calibri, arial, sans-serif !important; " >
                                <tr>
                                        <td>
                                        <div style="
                                        text-align: center;
                                        font-size: 1.3em;
                                        color: rebeccapurple;
                                        font-weight: 700;
                                        font-family: cursive;
                                    ">
                                    Vous avez une invitation pour
                                       
                                        </div>
                                        <div style="
                                        text-align: center;
                                        font-size: 2em;
                                        color: #ff9900;
                                        font-weight: 700;
                                        font-family: cursive;
                                    "> ' . $event->name . ' <br/>
                                        ' . $event->type . '
                                        </div>
                                        </td>
                                </tr>    
                                
                                <tr>
                                        <td>
                                        
                                        <a href="https://clickinvitation.com/cardInvitation/' . $cardId->id_card . '/' . $guest->code . '/' . $guest->name . '/' . $lang . '" style="
                                        background: #6633ff;
                                        color: white;
                                        padding: 20px;
                                        border-radius: 15px;
                                        text-decoration: none;
                                        font-size: 1.2em;
                                        font-weight: 600;
                                        display: block;
                                        margin: 10px auto;
                                        text-align: center;
                                        width: 250px;
                                    ">Cliquez ici pour voir la convocation</a>                            
                                        </td>
                                    </tr>
                                    
                                </table>


                                <table width="100%"  cellpadding="20"  style="background:#663399; color:#fff; font-size:12px; font-family: Calibri, arial, sans-serif !important; text-align:center; border:none; border-bottom-left-radius:20px; border-bottom-right-radius:20px;  " >
                                    <tr>                   
                                        <td>
                                            <p> This is an automated message please do not reply.<br>
                                                EventMasterPlan.com' . date('Y') . '. All rights reserved.<br>
                                                <a style="color:white;"  href="mailto:info@eventmasterplan.com">info@eventmasterplan.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a style="color:white;" href="https://clickinvitation.com/privacy-policy">Politique de confidentialité</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a style="color:white;" href="https://clickinvitation.com/termos-of-use">Termes et conditions</a>
                                            </p>
                                        </td>
                                    </tr>
                                </table>                
                            </td>
                        </tr>
                    </table>

                    <br>
                </body>
                </html>';
            }


            // Use Mail::send() with html() for HTML content
            Mail::send([], [], function ($message) use ($body, $guest, $event, $cardId) {
                $message->from('info@clickinvitation.com');
                $message->to($guest->email);
                if (strlen($cardId->msgTitle) > 0) {
                    $message->subject($cardId->msgTitle);
                } else {
                    $message->subject($event->name . ' Invitation');
                }

                $message->html($body);  // Use html() instead of setBody() for HTML content
            });

            return "OK";
        }
        return response()->json($guest);
    }

    public function sendSMS(Request $req)
    {
        $guest = DB::table('guests')->where('id_guest', $req->guestID)->first();
        $cardId = DB::table('cards')->where('id_card', $req->eventID)->first();
        $event = DB::table('events')->where('id_event', $cardId->id_event)->first();
        $lang = App::getLocale();

        $guestName = str_replace(" ", "+", $guest->name);

        if (strlen($guest->phone) > 0) {
            $params = ['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $guest->phone, 'Body' => $cardId->msgTitle . "\n\n" . 'You Got Invitation For ' . $event->name . ' ' . $event->type . ' https://clickinvitation.com/cardInvitations/' . $cardId->id_card . '/' . $guest->code . '/' . $guestName . '/' . $lang];
            if ($lang == 'en') {
                $params = ['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $guest->phone, 'Body' => $cardId->msgTitle . "\n\n" . 'You Got Invitation For ' . $event->name . ' ' . $event->type . ' https://clickinvitation.com/cardInvitations/' . $cardId->id_card . '/' . $guest->code . '/' . $guestName . '/' . $lang];
            } elseif ($lang == 'fr') {
                $params = ['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $guest->phone, 'Body' => $cardId->msgTitle . "\n\n" . 'Vous avez une invitation pour' . $event->name . ' ' . $event->type . ' https://clickinvitation.com/cardInvitations/' . $cardId->id_card . '/' . $guest->code . '/' . $guestName . '/' . $lang];
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
        }
    }

    public function saveimages(Request $request)
    {
        $event = Event::where('id_event', $request->idevent)->first();
        if ($event) {

            if ($request->file('mainimage')) {
                $image = $request->file('mainimage');
                $filename = time() . '.' . $image->extension();
                $image->move(public_path('event-images/' . $request->idevent), $filename);
                $event->mainimage = "/event-images/" . $request->idevent . "/" . $filename;
                $event->save();
            }


            if ($request->cerimg) {
                if (!file_exists('public/event-images/' . $request->idevent)) {
                    mkdir('public/event-images/' . $request->idevent, 0777, true);
                }

                $cerImagePath = $this->saveRecImage($request->cerimg, $request->idevent, 'cerimg.jpg');
                if ($cerImagePath) {
                    $event->cerimg = $cerImagePath;
                    $event->save();
                }
            }

            if ($request->recimg) {
                if (!file_exists('public/event-images/' . $request->idevent)) {
                    mkdir('public/event-images/' . $request->idevent, 0777, true);
                }

                $recImagePath = $this->saveRecImage($request->recimg, $request->idevent, 'recimg.jpg');
                if ($recImagePath) {
                    $event->recimg = $recImagePath;
                    $event->save();
                }

            }

            if ($request->parimg) {
                if (!file_exists('public/event-images/' . $request->idevent)) {
                    mkdir('public/event-images/' . $request->idevent, 0777, true);
                }

                $parImagePath = $this->saveRecImage($request->parimg, $request->idevent, 'parimg.jpg');
                if ($parImagePath) {
                    $event->parimg = $parImagePath;
                    $event->save();
                }
            }


            if ($request->hasFile('gall')) {
                if (!file_exists('public/event-images/' . $request->idevent . '/photogallery')) {
                    mkdir('public/event-images/' . $request->idevent . '/photogallery', 0777, true);
                }

                foreach ($request->file('gall') as $photo) {
                    // dd($request->file('gall'));
                    if ($photo->isValid()) {
                        $photogallery = new PhotoGallery;
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


            // Validate video file if it exists
            if ($request->hasFile('vid')) {
                $video = $request->file('vid');
                $maxSize = 15 * 1024 * 1024; // 15 MB in bytes

                if ($video->getSize() > $maxSize) {
                    return redirect()->back()->withErrors(['vid' => 'The video is too large to upload. Maximum size allowed is 15 MB.']);
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

                return redirect()->back()->with('success', 'Your video has been successfully uploaded! Enjoy the party!');
            }

            return redirect()->back();
        } else
            return 0;
    }

    public function sorrycant(Request $request)
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
                return view('operations.sorrycant')->with('guest', $guest)->with('event', $event);
            } else
                return redirect('/');
        } else
            return redirect('/');
    }

    public function decline(Request $request)
    {
        $guest = Guest::where('code', $request->guestcode)->first();
        if ($guest) {

            if ($request->decliner == "me") {
                $guest->declined = 1;
                $guest->id_table = 0;
                $guest->save();
                return response()->json(['status' => 'success', 'data' => 'Guest Declined Successfully']);
            }elseif ($request->decliner == "me_d") {
                $guest->declined = 0;
                $guest->save();
                return response()->json(['status' => 'success', 'data' => 'Guest UnDeclined Successfully']);
            } elseif ($request->decliner == "all") {
                $guests = Guest::where("parent_id_guest", $guest->id_guest)->get();
                foreach ($guests as $g) {
                    $g->declined = 1;
                    $guest->id_table = 0;
                    $g->save();
                }
            }elseif ($request->decliner == "all_d") {
                $guests = Guest::where("parent_id_guest", $guest->id_guest)->get();
                foreach ($guests as $g) {
                    $g->declined = 0;
                    $g->save();
                }
            } else {
                $guest = Guest::where('id_guest', $request->decliner)->first();
                if ($guest->declined == 0) {
                    $guest->id_table = 0;
                    $guest->declined = 1;
                } else{
                    $guest->declined = null;
                }
                $guest->save();
            }
        }
        return 1;
    }

    public function CheckInQr($card_id, $guest_code, $lang)
    {
        $url = url('/guest-checked/' . $card_id . '/' . $guest_code . '/' . $lang);
        return view('QrCode', compact('url', 'guest_code'));
    }

    public function sendMealInvitations(Request $request)
    {
        $eventId = GeneralHelper::getEventId();
        $event = Event::where('id_event', $eventId)->first();
        $lang = App::getLocale();
        $guestIds = $request->uniqueIds;
        $guests = Guest::whereIn('id_guest', $guestIds)->get();
        foreach ($guests as $guest) {
            if ($guest['email'] != null && $guest['email'] != "") {
                $mail = Mail::to($guest['email'])->send(new MealInvitation($event, $guest));
            }
            if ($guest['whatsapp'] != null && $guest['whatsapp'] != "") {
                $url = "https://graph.facebook.com/v16.0/112950588286835/messages";

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt(
                    $curl,
                    CURLOPT_HTTPHEADER,
                    array(
                        'Authorization: Bearer EAAJNk9TfhxABOyqSschCHIXhUyZBeJqurIW8ZBtjTZBYWOLCqnCrW8morXKZCK9aZBhTLc7XMKYxMTZBCKV85NoToguo5bNq5J88SFWyJEulKZCnX9jndDeN6p4ZB7Qr9HtVlG65pEZCBmqKXsxVNK5mv0HemfAOcg1MmCv9KRSAWZAiLwH4eWWW357MoZD',
                        'Content-Type: application/json'
                    )
                );
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $data = [
                    "messaging_product" => "whatsapp",
                    "to" => $guest['whatsapp'],
                    "type" => "template",
                    "template" => [
                        "name" => "select_meal",
                        "language" => ["code" => "en"],
                        "components" => array(
                            array(
                                "type" => "body",
                                "parameters" => [
                                    array(
                                        "type" => "text",
                                        "text" => !empty($guest['name']) ? $guest['name'] : "Guest"
                                    ),
                                    array(
                                        "type" => "text",
                                        "text" => !empty($event->name) ? $event->name : " "
                                    )
                                ]
                            )
                        )
                    ]
                ];

                $fields_string = json_encode($data);
                echo $fields_string;
                echo "<br/>";
                curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);

                $resp = curl_exec($curl);
                curl_close($curl);

                echo $resp;
            }
            if ($guest['phone'] != null && $guest['phone'] != "") {

                if ($lang == 'en') {
                    $params = ['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $guest['phone'], 'Body' => 'Hi ' . $guest['name'] . "\n\n" . "Please select your meal for the " . $event['name'] . " event." . "\n\n" . "Thank you! " . "\n" . "Click Invitation"];
                } elseif ($lang == 'fr') {
                    $params = ['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $guest['phone'], 'Body' => 'Hi ' . $guest['name'] . "\n\n" . "Veuillez sélectionner votre repas pour l'événement " . $event['name'] . "\n\n" . "Merci! " . "\n" . "Click Invitation"];
                } else {
                    $params = ['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $guest['phone'], 'Body' => 'Hi ' . $guest['name'] . "\n\n" . "Please select your meal for the " . $event['name'] . " event." . "\n\n" . "Thank you! " . "\n" . "Click Invitation"];
                }
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://api.twilio.com/2010-04-01/Accounts/AC1875f6f40ede2df24999ef0db6d666da/Messages.json');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_USERPWD, 'AC1875f6f40ede2df24999ef0db6d666da:ea0f387de51d18742c5114d0232433c8');
                $data = curl_exec($ch);
                curl_close($ch);

            }
        }
        return response()->json(['message' => 'Invitations sent successfully.']);
    }


    public function guestCanSelectSeats(Request $request)
    {
        $event = Event::where('id_event', $request->idevent)->first();
        $event->update([
            'guestCanSelectSeats' => $request->guestCanSelectSeats
        ]);
        return $event;
    }
}
