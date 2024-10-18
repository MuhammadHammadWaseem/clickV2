<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use App\Helpers\GeneralHelper;

class MealController extends Controller
{
    public function index(){
        $eventId = GeneralHelper::getEventId();
        $meals = Meal::where('id_event', $eventId);
        return view('Panel.dashboard.meals',compact('meals'));
    }

    public function store(Request $request)
    {
        try {
            // Create a new Meal instance
            $meal = new Meal();
            $meal->name = $request->namemeal;
            $meal->description = $request->descriptionmeal;
            $meal->id_event = $request->idevent;
            // Save the meal to the database
            $meal->save();
            return redirect()->back()->with('success', 'Meal created successfully!');

        } catch (\Exception $e) {
            // Flash error message if something goes wrong
            return redirect()->back()->with('error', 'Failed to create meal. Please try again.');
        }
    }

}
