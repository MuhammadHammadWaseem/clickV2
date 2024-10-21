<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use App\Helpers\GeneralHelper;

class GiftSuggestion extends Controller
{
   public function index(){
    $eventId = GeneralHelper::getEventId();
    $gift = Gift::where('id_event', $eventId)->get();
    return view('Panel.dashboard.gift-suggestion',compact('gift'));

}
}
