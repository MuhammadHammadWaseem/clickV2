<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Card;
use Illuminate\Support\Facades\DB;

class InvitationController extends Controller
{
    public function index(Request $request, $id)
    {
        $eventType = Event::where(['id_event' => $id])->get();
        $cardData = Card::select("*")->where([['id_event', '=', $id]])->orderBy('id_card', 'desc')->get();
        
        $cardImgs = DB::table('cards_upload')->where(['id_eventtype' => $eventType[0]->type_id, 'type' => 'card'])->get();
        $bgImgs = DB::table('cards_upload')->where(['id_eventtype' => $eventType[0]->type_id, 'type' => 'background'])->get();

        $stickers = DB::table('stickers')->get();

        if ($cardData->count() > 0) {

            
            $cardData[0]->eventType = $eventType[0]->type;
            $cardData[0]->eventCouple = $id;
            $cardData[0]->result = "1";
            $cardData[0]->cardImgs = $cardImgs;
            $cardData[0]->bgImgs = $bgImgs;
            $cardData[0]->stickers = $stickers;
            $cardData = $cardData[0];
            return view('Panel.dashboard.invitation',compact('cardData'));
        }
        return view('Panel.dashboard.invitation');
    }
}
