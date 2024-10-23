<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Meal;

use App\Models\Event;
use App\Models\Guest;
use App\Models\Table;
use App\Jobs\AckMailJob;
use Illuminate\Http\Request;
use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class reminderController extends Controller
{
    public function index(){
        $eventId = GeneralHelper::getEventId();
        $reminder = Event::where('id_event', $eventId)->get();

        $guests = DB::select('
        SELECT *
            FROM guests
            WHERE (id_event = ' . $eventId . ') AND
            (
                ((checkin = 1) AND declined is NULL AND ((id_meal IS NOT NULL) OR (opened = 2))) OR
                (((opened = 2) OR (id_meal IS NOT NULL)) AND (declined is NULL))
            )
        ');

        foreach ($guests as $guest) {

            if ($guest->id_table != 0) {
                $table = Table::where('id_table', $guest->id_table)->first();
                if ($table){
                    $guest->tablename = $table->name;
                }
            }
            if ($guest->id_meal != null) {
                $meal = Meal::where('id_meal', $guest->id_meal)->first();
                if ($meal){
                    $guest->mealName = $meal->name;
                }
            }
        }

        return view('Panel.dashboard.reminder',compact('reminder','guests'));
    }
    public function sendAckMail(Request $request)
    {
        foreach($request->selectedEmails as $ids){
                $event = Event::where('id_event', $request->idevent)->first();
                $guestsend = Guest::where('id_guest', $ids)->first();
                $cardId = Card::select("*")->where([['id_event', "=", $event->id_event]])->orderBy('id_card', 'desc')->first()->id_card;

                $guestName = str_replace(" ", "+", $guestsend['name']);

                $lang = App::getLocale();
                // echo $lang;
                if ($guestsend['email'] && $guestsend['parent_id_guest'] == 0) {

                    AckMailJob::dispatch(
                       0, // fake (replace this with the actual value if needed)
                        $lang,
                        $cardId,
                        $event,
                        $guestsend,
                        $guestsend['email']
                    );
            }
        }

    }

}
