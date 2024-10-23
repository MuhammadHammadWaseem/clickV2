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

                    if ($event && $guestsend['email'] && $guestsend['parent_id_guest'] == 0) {
                        AckMailJob::dispatch(
                            0, // fake
                            $lang,
                            $cardId,
                            $event,  // Pass the event object here
                            $guestsend,
                            $guestsend['email']
                        );
                    }

            }
        }

    }

    public function sendAcWhatsapp(Request $request)
    {
        //return $request;
        foreach ($request->guests as $guest) {
            //---------- WHATSAPP ----------------------

            $g = Guest::where('id_guest',$guest)->first();

            $event = Event::where('id_event', $request->idevent)->first();
            $guestsend = Guest::where('id_guest', $g->id_guest)->first();
            $cardId = Card::select("*")->where([['id_event', "=", $event->id_event]])->orderBy('id_card', 'desc')->first();
            $lang = App::getLocale();
            $guestName = str_replace(" ", "+", $g->name);

            $url = "https://graph.facebook.com/v16.0/112950588286835/messages";

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization:Bearer EAAJNk9TfhxABOyqSschCHIXhUyZBeJqurIW8ZBtjTZBYWOLCqnCrW8morXKZCK9aZBhTLc7XMKYxMTZBCKV85NoToguo5bNq5J88SFWyJEulKZCnX9jndDeN6p4ZB7Qr9HtVlG65pEZCBmqKXsxVNK5mv0HemfAOcg1MmCv9KRSAWZAiLwH4eWWW357MoZD', 'Content-Type: application/json'));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


            $data = array(
                "messaging_product" => "whatsapp",
                "to" => $g->whatsapp,
                "type" => "template",

                "template" => array(
                    "name" => "acknowledgement",
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
                                    "text" => 'Link: ' . 'https://clickinvitation.com/mail-acknowledgment/' . $g->id_guest . '/' . $request->idevent
                                ],
                                [
                                    "type" => "text",
                                    "text" => '*CLICKINVITATION*'
                                ],
                            )
                        ]
                    )
                )
            );

            $fields_string = json_encode($data);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
            $resp = curl_exec($curl);
            curl_close($curl);
        }
        return response()->json([
            'success' => 'Message Sent Successfully',
        ]);
    }

    public function sendAcSm(Request $request)
    {
        dd($request);
        foreach ($request->guests as $guest) {
            if (isset($guest['phoneselected']) && $guest['phoneselected'] == 1) {

                $event = Event::where('id_event', $request->idevent)->first();
                $guestsend = Guest::where('id_guest', $guest['id_guest'])->first();
                $cardId = Card::select("*")->where([['id_event', "=", $event->id_event]])->orderBy('id_card', 'desc')->first();
                $lang = App::getLocale();
                //---------- SMS ----------------------
                // $params = ['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => $cardId->msgTitle . "\n\n" . "You Got a new Acknowledgement \n https://clickinvitation.com/mail-acknowledgment/" . $guest['id_guest'] . "/" . $event->id_event];
                $params = ['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => $cardId->msgTitle . "\n\n" . "*Congratulations* \n\n *You Got the Acknowledgement* \n\n Click on the link to know about your Host: https://clickinvitation.com/mail-acknowledgment/" . $guest['id_guest'] . "/" . $event->id_event . "\n\n We hope you enjoy the event." . "\n\n" . "Click here to know more - https://clickinvitation.com/"];
                /*}
                elseif ($lang == 'fr'){
                    $params=['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] ."\n\n". 'Vous avez une invitation pour'.$event->name.' '.$event->type.' https://clickinvitation.com/cardInvitation/'.$cardId['id_card'].'/'.$guest['code'].'/'.$guestName.'/'.$lang];
                }else {
                    $params=['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] ."\n\n". 'You Got Invitation For '.$event->name.' '.$event->type.' https://clickinvitation.com/cardInvitation/'.$cardId['id_card'].'/'.$guest['code'].'/'.$guestName.'/'.$lang];
                }*/
                //$params=['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => 'You Got Invitation For '.$event->name.' '.$event->type.' https://clickinvitation.com/cardInvitation/'.$cardId['id_card'].'/'.$guest['code'].'/'.$lang];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://api.twilio.com/2010-04-01/Accounts/AC23420c2979a6b17c66be8716156b3424/Messages.json');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_USERPWD, 'AC23420c2979a6b17c66be8716156b3424:af04ad9f56df5b0132389583a0e46061');
                $data = curl_exec($ch);
                curl_close($ch);
            }
        }
    }


}
