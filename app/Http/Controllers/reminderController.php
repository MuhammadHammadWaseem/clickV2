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
                ((checkin = 1) AND (declined is NULL OR declined = 0) AND ((id_meal IS NOT NULL) OR (opened = 2))) OR
                (((opened = 2) OR (id_meal IS NOT NULL)) AND (declined is NULL OR declined = 0))
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
                // if ($guestsend['email'] && $guestsend['parent_id_guest'] == 0) {

                    if ($event && $guestsend['email']) {
                        AckMailJob::dispatch(
                            0, // fake
                            $lang,
                            $cardId,
                            $event,  // Pass the event object here
                            $guestsend,
                            $guestsend['email']
                        );
                    }

            // }
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
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization:Bearer EAAJNk9TfhxABOyJZAdwno3UohLjPQfAxVXp6y9b4ZCtnd9VVyPzaRryMSXYYSTABPOXYahVXQoxY4a8vX9GWj2RkbH8tTLC605ZAbJ3x63xu6Bz3tvXmxWxJEd2spIpKcgpiwOdESoWZAga3VZCeKX5praY08hbpcA74YGm8uHJjMy7fcCUdhyHAZD', 'Content-Type: application/json'));
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

    public function sendAcSms(Request $request)
    {
        foreach ($request->guests as $guest) {
            $g = Guest::where('id_guest',$guest)->first();

            $event = Event::where('id_event', $request->idevent)->first();
            $guestsend = Guest::where('id_guest', $g->id_guest)->first();
            $cardId = Card::select("*")->where([['id_event', "=", $event->id_event]])->orderBy('id_card', 'desc')->first();
            $lang = App::getLocale();
            //---------- SMS ----------------------
            // $params = ['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $g->phone, 'Body' => $cardId->msgTitle . "\n\n" . "You Got a new Acknowledgement \n https://clickinvitation.com/mail-acknowledgment/" . $g->id_guest . "/" . $event->id_event];
            $params = ['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $g->phone, 'Body' => $cardId->msgTitle . "\n\n" . "*Congratulations* \n\n *You Got the Acknowledgement* \n\n Click on the link to know about your Host: https://clickinvitation.com/mail-acknowledgment/" . $g->id_guest . "/" . $event->id_event . "\n\n We hope you enjoy the event." . "\n\n" . "Click here to know more - https://clickinvitation.com/"];
            /*}
            elseif ($lang == 'fr'){
                $params=['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $g->phone, 'Body' => $cardId['msgTitle'] ."\n\n". 'Vous avez une invitation pour'.$event->name.' '.$event->type.' https://clickinvitation.com/cardInvitation/'.$cardId['id_card'].'/'.$g->code.'/'.$guestName.'/'.$lang];
            }else {
                $params=['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $g->phone, 'Body' => $cardId['msgTitle'] ."\n\n". 'You Got Invitation For '.$event->name.' '.$event->type.' https://clickinvitation.com/cardInvitation/'.$cardId['id_card'].'/'.$g->code.'/'.$guestName.'/'.$lang];
            }*/
            //$params=['MessagingServiceSid' => 'MGc3abea24552404515b56c737c2043952', 'To' => $g->phone, 'Body' => 'You Got Invitation For '.$event->name.' '.$event->type.' https://clickinvitation.com/cardInvitation/'.$cardId['id_card'].'/'.$g->code.'/'.$lang];
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

    public function editsave(Request $request)
    {
        $event = Event::where('id_event', $request->idevent)->first();
        if ($event) {
            if ($request->has('atitle'))
                $event->atitle = $request->atitle;
            if ($request->has('asubtitle'))
                $event->asubtitle = $request->asubtitle;
            if ($request->has('atext'))
                $event->atext = $request->atext;
            if ($request->has('ititle'))
                $event->ititle = $request->ititle;
            if ($request->has('isubtitle'))
                $event->isubtitle = $request->isubtitle;
            if ($request->has('itext'))
                $event->itext = $request->itext;
            if ($request->has('mtitle'))
                $event->mtitle = $request->mtitle;
            if ($request->has('msubtitle'))
                $event->msubtitle = $request->msubtitle;
            if ($request->has('mtext'))
                $event->mtext = $request->mtext;



            // if ($request->photo) {
            //     $image = new \Imagick();
            //     $image->readimageblob(base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $request->photo)));
            //     $image->setImageFormat('jpg');
            //     if ($request->type == 'invitation')
            //         $results = $image->writeImages("public/event-images/" . $request->idevent . "/invitation.jpg", true);
            //     if ($request->type == 'messaging')
            //         $results = $image->writeImages("public/event-images/" . $request->idevent . "/messaging.jpg", true);
            //     if ($request->type == 'acknowledgment')
            //         $results = $image->writeImages("public/event-images/" . $request->idevent . "/acknowledgment.jpg", true);
            // }

            $event->save();


            return 1;
        } else
            return 0;
    }

    public function ackWebPage(Request $request)
    {
        if ($request->route('idguest') != 'fake') {
            $guest = Guest::where('id_guest', $request->route('idguest'))->first();
            $cardId = Card::where('id_event', $request->route('idevent'))->orderBy('id_card', 'desc')->first()->id_card;
            $lang = App::getLocale();
            if ($guest && $guest->id_event == $request->route('idevent')) {
                $event = Event::where('id_event', $request->route('idevent'))->first();
                if ($event)
                    return view('mails.acknowledgment')->with('event', $event)->with('guest', $guest)->with('cardId', $cardId)->with('lang', $lang)->with('fake', 0);
                else
                    return redirect('/');
            } else
                return redirect('/');
        } else {
            $event = Event::where('id_event', $request->route('idevent'))->first();
            if ($event)
                return view('mails.acknowledgment')->with('event', $event)->with('fake', 1);
            else
                return redirect('/');
        }
    }


}
