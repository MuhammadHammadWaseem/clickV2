<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use App\Helpers\GeneralHelper;
use App\Models\Guest;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class MealController extends Controller
{
    public function index()
    {
        $eventId = GeneralHelper::getEventId();
        $meals = Meal::where('id_event', $eventId)->get();
        $event = Event::with('eventType')->where('id_event', $eventId)->where('id_user', Auth::id())->first();
        return view('Panel.dashboard.meals', compact('meals','event'));
    }
    public function showMeals()
    {
        $eventId = GeneralHelper::getEventId();
        $meals = Meal::where('id_event', $eventId)->get();
        return response()->json([
            'success' => true,
            'message' => 'Meals Get Successfully!',
            'meals' => $meals,
        ]);
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
            return response()->json([
                'success' => true,
                'message' => 'Meal created successfully!',
            ]);
            // return redirect()->back()->with('success', 'Meal created successfully!');

        } catch (\Exception $e) {
            // Flash error message if something goes wrong
            return response()->json([
                'success' => false,
                'message' => 'Failed to create meal. Please try again.',
            ]);
            // return redirect()->back()->with('error', 'Failed to create meal. Please try again.');
        }
    }
    // In MealController.php

    public function edit($id)
    {
        $meal = Meal::find($id);

        if (!$meal) {
            return response()->json(['error' => 'Meal not found'], 404);
        }
        // Return the meal data as JSON for the modal
        return response()->json($meal);
    }

    public function update(Request $request, $id)
    {
        // Validate input if necessary
        $request->validate([
            'namemeal' => 'required|string|max:25',
            'descriptionmeal' => 'nullable|string',
            'id_event' => 'required|integer', // Assuming you need an event ID
        ],
        [
            'namemeal.required' => 'The name field is required.',
            'namemeal.string' => 'The name field must be a string.',
            'namemeal.max' => 'The name field must not exceed 25 characters.',
            'descriptionmeal.string' => 'The description field must be a string.',
            'id_event.required' => 'The event ID field is required.',
            'id_event.integer' => 'The event ID field must be an integer.',
        ]
    );

        $meal = Meal::findOrFail($id);
        $meal->name = $request->namemeal; // Ensure this name matches your form's input name
        $meal->description = $request->descriptionmeal;
        $meal->id_event = $request->id_event; // Make sure this is set correctly
        $meal->save();

        return response()->json(['success' => 'Meal updated successfully!']);
    }
    public function destroy($id)
    {
        $meal = Meal::findOrFail($id);
        $guests = Guest::where('id_meal', $meal->id_meal)->get();

        if ($guests) {
            foreach ($guests as $guest) {
                $guest->id_meal = 0;
                $guest->save();
            }
        }

        $meal->delete();
        return response()->json(['success' => 'Meal deleted successfully']);
    }

}
