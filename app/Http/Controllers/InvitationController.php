<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Card;
use Illuminate\Support\Facades\DB;
use App\Models\CardsUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class InvitationController extends Controller
{
    public function index(Request $request, $id)
    {
        $eventType = Event::where(['id_event' => $id])->get();
        if (!$eventType) {
            return redirect()->back()->with('error', 'Event not found!');
        }
        $cardData = Card::select("*")->where([['id_event', '=', $id]])->orderBy('id_card', 'desc')->get();

        $cardImgs = DB::table('cards_upload')->where(['id_eventtype' => $eventType[0]->type_id, 'type' => 'card'])->get();
        $bgImgs = CardsUpload::where('id_eventtype', $eventType[0]->type_id)->where('type', 'background')->get();
        $stickers = DB::table('stickers')->get();
        if ($cardData->count() > 0) {
            $cardData[0]->eventType = $eventType[0]->type;
            $cardData[0]->eventCouple = $id;
            $cardData[0]->result = "1";
            $cardData[0]->cardImgs = $cardImgs;
            $cardData[0]->bgImgs = $bgImgs;
            $cardData[0]->stickers = $stickers;
            $cardData = $cardData[0];
        }else{
            $cardData = null;
        }
        return view('Panel.dashboard.invitation', compact('cardData'));
    }

    public function settingUpdate(Request $request)
    {
        $card = Card::where('id_event', $request->event_id)->get();
        if ($card && $card->count() > 0) {
            foreach ($card as $c) {
                $c->id_user = Auth::id();
                $c->id_event = $request->event_id;
                $c->title1 = $request->title1;
                $c->title2 = $request->title2;
                $c->title3 = $request->title3;
                $c->title4 = $request->title4;
                $c->titleFont = $request->titleFont;
                $c->titleColor = $request->titleColor;
                $c->name1 = $request->name1;
                $c->name2 = $request->name2;
                $c->cermony = $request->cermony;
                $c->cermonyFont = $request->cermonyFont;
                $c->cermonyColor = $request->cermonyColor;
                $c->other1 = $request->other1;
                $c->other2 = $request->other2;
                $c->other3 = $request->other3;
                $c->otherFont = $request->otherFont;
                $c->otherColor = $request->otherColor;
                $c->bgName = $request->bgName;
                $c->cardName = $request->cardName;
                $c->fontColor = $request->fontColor;
                $c->fontFamily = $request->fontFamily;
                $c->customCard = $request->customCard;
                $c->cardColorOut = $request->colorOut;
                $c->cardColorIn = $request->colorIn;
                $c->rsvp = $request->rsvp;
                $c->msgTitle = $request->msg;
                $c->envTitleFont = $request->envTitleFont;
                $c->envTitleColor = $request->envTitleColor;
                $c->save();
                $c->refresh();
            }
        } else {
            $card = new Card;
            $card->id_user = Auth::id();
            $card->id_event = $request->event_id;
            $card->title1 = $request->title1;
            $card->title2 = $request->title2;
            $card->title3 = $request->title3;
            $card->title4 = $request->title4;
            $card->titleFont = $request->titleFont;
            $card->titleColor = $request->titleColor;
            $card->name1 = $request->name1;
            $card->name2 = $request->name2;
            $card->cermony = $request->cermony;
            $card->cermonyFont = $request->cermonyFont;
            $card->cermonyColor = $request->cermonyColor;
            $card->other1 = $request->other1;
            $card->other2 = $request->other2;
            $card->other3 = $request->other3;
            $card->otherFont = $request->otherFont;
            $card->otherColor = $request->otherColor;
            $card->bgName = $request->bgName;
            $card->cardName = $request->cardName;
            $card->fontColor = $request->fontColor;
            $card->fontFamily = $request->fontFamily;
            $card->customCard = $request->customCard;
            $card->cardColorOut = $request->colorOut;
            $card->cardColorIn = $request->colorIn;
            $card->rsvp = $request->rsvp;
            $card->msgTitle = $request->msg;
            $card->envTitleFont = $request->envTitleFont;
            $card->envTitleColor = $request->envTitleColor;
            $card->save();
        }
        return response()->json([
            'success' => true,
            'message' => 'Setting Updated Successfully!'
        ]);
    }

    public function csrfToken()
    {
        return csrf_token();
    }
    public function getCsrfToken()
    {
        return csrf_token();
    }

    function getCard(Request $request)
    {
        $eventType = Event::where(['id_event' => $request->route("event_id")])->get();
        $cardData = Card::select("*")->where([['id_event', '=', $request->route("event_id")]])->orderBy('id_card', 'desc')->get();
        $isCouple = '';
        $isCouple = DB::table('event_type')->where(['id_eventtype' => $eventType[0]->type_id])->get();

        $cardImgs = DB::table('cards_upload')->where(['id_eventtype' => $eventType[0]->type_id, 'type' => 'card'])->get();
        $bgImgs = DB::table('cards_upload')->where(['id_eventtype' => $eventType[0]->type_id, 'type' => 'background'])->get();

        $stickers = DB::table('stickers')->get();

        if ($cardData->count() > 0) {

            $isCouple = DB::table('event_type')->where(['id_eventtype' => $eventType[0]->type_id])->get();
            $cardData[0]->eventType = $eventType[0]->type;
            $cardData[0]->isCouple = $isCouple[0]->couple_event;
            $cardData[0]->eventCouple = $request->route("event_id");
            $cardData[0]->result = "1";
            $cardData[0]->cardImgs = $cardImgs;
            $cardData[0]->bgImgs = $bgImgs;
            $cardData[0]->stickers = $stickers;
            return $cardData[0];
        }
        return ["result" => 0, 'eventType' => $eventType[0]->type, 'isCouple' => $isCouple[0]->couple_event, 'cardImgs' => $cardImgs, 'bgImgs' => $bgImgs, 'stickers' => $stickers];
    }
    function getCard2(Request $request)
    {
        $eventType = Event::where(['id_event' => $request->route("event_id")])->get();
        $cardData = Card::select("*")->where([['id_event', '=', $request->route("event_id")]])->orderBy('id_card', 'desc')->get();
        $isCouple = '';
        $isCouple = DB::table('event_type')->where(['id_eventtype' => $eventType[0]->type_id])->get();

        $cardImgs = DB::table('cards_upload')->where(['id_eventtype' => $eventType[0]->type_id, 'type' => 'card'])->get();
        $bgImgs = DB::table('cards_upload')->where(['id_eventtype' => $eventType[0]->type_id, 'type' => 'background'])->get();

        $stickers = DB::table('stickers')->get();

        if ($cardData->count() > 0) {

            $isCouple = DB::table('event_type')->where(['id_eventtype' => $eventType[0]->type_id])->get();
            $cardData[0]->eventType = $eventType[0]->type;
            $cardData[0]->isCouple = $isCouple[0]->couple_event;
            $cardData[0]->eventCouple = $request->route("event_id");
            $cardData[0]->result = "1";
            $cardData[0]->cardImgs = $cardImgs;
            $cardData[0]->bgImgs = $bgImgs;
            $cardData[0]->stickers = $stickers;
            return $cardData[0];
        }
        return ["result" => 0, 'eventType' => $eventType[0]->type, 'isCouple' => $isCouple[0]->couple_event, 'cardImgs' => $cardImgs, 'bgImgs' => $bgImgs, 'stickers' => $stickers];
    }

    public function getJson(Request $request)
    {
        $event = DB::table('events')->where('id_event', $request->id)->first();

        if ($event) {
            return response()->json(['data' => $event->json]);
        } else {
            return response()->json(['message' => 'Event not found'], 404);
        }
    }
    public function getJsonBack(Request $request)
    {
        $event = DB::table('events')->where('id_event', $request->id)->first();

        if ($event) {
            $updatedJson = str_replace('.json', 'Back.json', $event->json);

            return response()->json(['data' => $updatedJson]);
        } else {
            return response()->json(['message' => 'Event not found'], 404);
        }
    }

    public function getTemplates($id)
    {
        $event = Event::findOrFail($id);
        $templates = DB::table('templates')->where('type_id', $event->type_id)->get();
        return response()->json(['data' => $templates]);
    }

    private static $jsonFolderCreated = false;
    public function saveBlob(Request $request)
    {
        \Log::info('Incoming Request Data:', $request->all());
        try {
            if (!self::$jsonFolderCreated) {
                $folderName = 'Json';
                $folderPath = public_path($folderName);
                if (!File::exists($folderPath)) {
                    File::makeDirectory($folderPath, 0777, true, true);
                }
                self::$jsonFolderCreated = true;
            }
            $base64Image = $request->data_url;
            $base64Image = str_replace('data:image/png;base64,', '', $base64Image);
            $decodedImage = base64_decode($base64Image);
            $imagePath = public_path('card-images/' . $request->event_id . '.png');
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            file_put_contents($imagePath, $decodedImage);
            $requestData = json_encode($request->all(), JSON_PRETTY_PRINT);
            $filename = $request->event_id . '.json';
            $filePath = public_path('Json/' . $filename);
            File::put($filePath, $request->json_blob);

            $event = DB::table('events')->where('id_event', $request->event_id)->get();

            // return $event;
            if ($event) {
                DB::table('events')->where('id_event', $request->event_id)->update([
                    'json' => $filename
                ]);
            } else {
                DB::table('events')->insert([
                    'id_event' => $request->event_id,
                    'json' => $filename,
                ]);
            }

            return response()->json(['message' => 'JSON file saved successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    private static $jsonFolderCreatedBack = false;
    public function saveBlobBack(Request $request)
    {
        try {
            if (!self::$jsonFolderCreatedBack) {
                $folderName = 'Json';
                $folderPath = public_path($folderName);
                if (!File::exists($folderPath)) {
                    File::makeDirectory($folderPath, 0777, true, true);
                }
                self::$jsonFolderCreatedBack = true;
            }
            $base64Image = $request->data_url;
            $base64Image = str_replace('data:image/png;base64,', '', $base64Image);
            $decodedImage = base64_decode($base64Image);
            $imagePath = public_path('card-images/' . $request->event_id . 'Back' . '.png');
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            file_put_contents($imagePath, $decodedImage);
            $requestData = json_encode($request->all(), JSON_PRETTY_PRINT);
            $filename = $request->event_id . 'Back' . '.json';
            $filePath = public_path('Json/' . $filename);
            File::put($filePath, $request->json_blob);

            $event = DB::table('events')->where('id_event', $request->event_id)->get();

            return response()->json(['message' => 'JSON file saved successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    public function getAnimations(Request $request)
    {
        $card = DB::table('cards')->where('id_event', $request->id_event)->orderBy('id_card', 'desc')->first();
        $animations = DB::table('animation')->get();
        $event = DB::table('events')->where('id_event', $request->id_event)->first();
        if ($event) {
            $animation_id = $event->id_animation;
        } else {
            $animation_id = null;
        }
        return response()->json(['data' => $animations, 'animation_id' => $animation_id, 'card' => $card]);
    }

    public function cardPreviewNew(Request $request)
    {
        $cardData = Card::select("*")->where([['id_card', '=', $request->route("id")]])->get();
        $eventData = Event::select("*")->where(['id_event' => $cardData[0]->id_event])->get();
        $eventType = DB::table('event_type')->where(['id_eventtype' => $eventData[0]->type_id])->get();
        $animation = DB::table('events')->where(['id_event' => $cardData[0]->id_event])->first();
        $animation = DB::table('animation')->where(['id_animation' => $animation->id_animation])->get();
        if ($animation[0]->file_animation_preview == 'no_animation_preview') {
            return view('noAnimation', ["cardData" => $cardData, "eventData" => $eventData]);
        }
        return view($animation[0]->file_animation_preview, ["cardData" => $cardData, "eventData" => $eventData]);
    }

    public function getTemplateWithId($id)
    {
        $templates = DB::table('templates')->where('id', $id)->get();
        return response()->json(['data' => $templates]);
    }

    public function toggleTwoSided(Request $request)
    {
        $card = Card::where("id_event", $request->id_event)->get();
        foreach ($card as $c) {
            $c->two_sided = $request->two_sided;
            $c->save();
        }
        if ($request->two_sided == 1) {
            return response()->json(["message" => "Two Sided Enabled"], 200);
        } else {
            return response()->json(["message" => "Two Sided Disabled"], 200);
        }
    }
    public function saveAnimation(Request $request)
    {
        $event = DB::table('events')->where('id_event', $request->event_id)->update(['id_animation' => $request->id_animation]);
        return response()->json(['message' => 'Success']);
    }

    public function uploadStamp(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
        ]);

        // Retrieve the cards associated with the event
        $cards = Card::where('id_event', $request->id_event)->get();

        if ($request->hasFile('file')) {
            // Directory where the stamps are stored
            $path = public_path('event-images/' . $request->id_event . '/stamp');

            // Create the directory if it doesn't exist
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            } else {
                // Delete all files in the directory
                $files = glob($path . '/*'); // Get all file names in the directory
                foreach ($files as $file) {
                    if (is_file($file)) {
                        unlink($file); // Delete the file
                    }
                }
            }

            // Get the original name of the uploaded file
            $fileName = $request->file('file')->getClientOriginalName();

            // Loop through each card and update the stamp
            foreach ($cards as $card) {
                $card->stamp = $fileName;
                $card->save();
            }

            // Move the uploaded file to the specified directory
            $request->file('file')->move($path, $fileName);

            return response()->json(['message' => 'Stamp uploaded successfully'], 200);
        }

        return response()->json(['success' => false], 400);
    }
}
