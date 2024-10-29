<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use Illuminate\Support\Facades\DB;
use App\Models\Guest;
use App\Helpers\GeneralHelper;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\Meal;

class TableSeatingController extends Controller
{
    public function index()
    {
        $eventId = GeneralHelper::getEventId();
        $event = Event::where('id_event', $eventId)->first();
        $isCorporate = $event->type == "CORPORATE" ? 1 : 0;
        return view("Panel.dashboard.guest-list.index", compact('isCorporate'));
    }

    public function showTables()
    {

        $eventId = GeneralHelper::getEventId();
        $tables = Table::where('id_event', $eventId)->orderBy('number')->get();
        foreach ($tables as $t) {
            // $t->guests= Guest::where('id_table',$t->id_table)->where('declined','=' , NULL)->get();
            $t->guests = DB::select('SELECT guests.*, meals.name AS meal_name FROM guests LEFT JOIN meals ON guests.id_meal = meals.id_meal WHERE id_table = ? AND declined IS NULL', [$t->id_table]);
            $t->seats = DB::table('seats')->where('seats.id_table', $t->id_table)->get();
            foreach ($t->seats as $seats) {
                $seats->guest = Guest::where('id_guest', $seats->id_guest)->first();

                if ($seats->guest) {
                    $seats->guest->meal = DB::table('meals')->where('id_meal', $seats->guest->id_meal)->first();
                }

            }
        }

        return response()->json([
            'success' => true,
            'table' => $tables,
            'message' => 'Tables Get Successfully!'
        ]);
    }
    public function showTableGuest($id)
    {
        $guests = DB::select('
        SELECT *
            FROM guests
            WHERE (id_event = ' . $id . ') AND 
            (
                ((checkin = 1) AND declined is NULL AND ((id_meal IS NOT NULL) OR (opened = 2))) OR
                (((opened = 2) OR (id_meal IS NOT NULL)) AND (declined is NULL))
            )
            ORDER BY id_table ASC
        ');

        foreach ($guests as $guest) {

            if ($guest->id_table != 0) {
                $table = Table::where('id_table', $guest->id_table)->first();
                if ($table)
                    $guest->tablename = $table->name;
            }
            if ($guest->id_meal != null) {
                $meal = Meal::where('id_meal', $guest->id_meal)->first();
                if ($meal)
                    $guest->mealName = $meal->name;
            }
        }

        return response()->json([
            'success' => true,
            'guests' => $guests,
            'message' => 'Guests Get Successfully!'
        ]);
    }

    public function showTableData($id)
    {
        $table = Table::where('id_table', $id)->first();
        return response()->json([
            'table' => $table
        ]);
    }

    public function storeTables(Request $request)
    {
        $table = new Table;
        $table->name = $request->table_name;
        $table->number = $request->table_number;
        $table->guest_number = $request->max_guest;
        $table->id_event = $request->id_event;
        $table->save();

        $insertedId = $table->id_table;

        $idEventType = DB::table('events')->where(['id_event' => $request->id_event])->first();

        $isCorp = DB::table('event_type')->where(['id_eventtype' => $idEventType->type_id])->first();

        if ($isCorp->corporate_event) {
            for ($i = 0; $i < $request->max_guest; $i++) {
                DB::insert('insert into seats (id_table, seat_name, id_guest) values (?, ?, ?)', [$insertedId, 'Seat ' . ($i + 1), 0]);
            }
        }
        return response()->json([
            'success' => true,
            'message' => 'Table Added Successfully!'
        ]);
    }

    public function editTable(Request $request, $id)
    {
        $table = Table::where('id_table', $id)->first();
        if ($table) {
            $table->name = $request->table_name;
            $table->number = $request->table_number;
            $table->guest_number = $request->max_guest;
            $table->save();

            $idEventType = DB::table('events')->where(['id_event' => $request->idevent])->first();
            $isCorp = DB::table('event_type')->where(['id_eventtype' => $idEventType->type_id])->first();

            if ($isCorp->corporate_event) {
                $seatCount = DB::table('seats')->where(['id_table' => $id])->count();
                $seats = DB::table('seats')->where(['id_table' => $id])->orderBy('id', 'desc')->get();

                if ($seatCount > $request->max_guest) {
                    //remove seats here
                    $removeCount = $seatCount - $request->max_guest;

                    for ($i = 0; $i < $removeCount; $i++) {
                        DB::table('seats')->where('id', $seats[$i]->id)->delete();
                    }

                } elseif ($seatCount < $request->max_guest) {
                    //add more seats here
                    $addCount = $request->max_guest - $seatCount;
                    $seatNewCount = $seatCount;
                    for ($i = 0; $i < $addCount; $i++) {
                        $seatNewCount++;
                        DB::insert('insert into seats (id_table, seat_name, id_guest) values (?, ?, ?)', [$id, 'Seat ' . $seatNewCount, 0]);

                    }
                }
            }
            return response()->json([
                'success' => true,
                'message' => 'Table Updated Susseccfully!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Table Not Found!'
            ]);
        }
    }

    public function deleteTable(Request $request, $id)
    {
        $table = Table::where('id_table', $id)->first();
        if ($table) {
            $event = Event::where('id_event', $table->id_event)->first();
            if ($event && $event->id_user == Auth::id()) {
                $table->delete();
                $guests = Guest::where('id_table', $id)->get();
                foreach ($guests as $g) {
                    $g->id_table = 0;
                    $g->save();
                }
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function setTable(Request $request)
    {
        $guests = Guest::where('id_table', $request->table_id)->get();
        foreach ($guests as $g) {
            $g->id_table = 0;
            $g->save();
        }

        foreach ($request->guests as $g) {
            $newGuest = Guest::where('id_guest', $g)->first();
            if ($newGuest) {
                $newGuest->id_table = $request->table_id;
                $newGuest->save();
            }
        }
        return response()->json([
            'success' => true,
            'message' => 'Table Set Successfully!',
        ]);
    }

    public function settablesseat(Request $request)
    {
        $guest = Guest::where('id_guest', $request->guestId)->first();
        if ($guest) {
            $guest->id_table = $request->tableId;
            $guest->save();

            $old = DB::table('seats')->where('id_guest', $request->guestId)->get();
            $old2 = DB::table('seats')->where('id', $request->seatId)->get();
            //return $old2;
            if (count($old2) > 0) {
                if ($old2[0]->id_guest != 0) {
                    //DB::update("update guests set id_table = 0 where id =".$old2[0]->id_guest); 
                    $guestOld = Guest::where('id_guest', $old2[0]->id_guest)->first();
                    if ($guestOld) {
                        $guestOld->id_table = 0;
                        $guestOld->save();
                    }
                }

            }

            if (count($old) > 0) {

                DB::update("update seats set id_guest = '0' where id =" . $old[0]->id);
            }


            DB::update('update seats set id_guest = ' . $request->guestId . ' where id =' . $request->seatId);

            $NGuest = Guest::where('id_guest', $request->guestId)->first();
            $table = Table::where('id_table', $NGuest->id_table)->first();
            $seat = DB::table('seats')->where(['id' => $request->seatId, 'id_table' => $request->tableId])->first();
            $number = preg_replace('/[^0-9]/', '', $seat->seat_name);
            $table->guest_number = $number;
            $table->save();
            return 1;
        }
        return 0;
    }

    public function removeGuest(Request $request)
    {
        //return $request;
        $guest = Guest::where('id_guest', $request->guestId)->first();
        if ($guest) {
            $guest->id_table = '0';
            $guest->save();
            DB::update("update seats set id_guest = '0' where id_guest =" . $request->guestId);
        }
    }

    public function print(Request $request)
    {
        $event = Event::where('id_event', $request->route('idevent'))->first();
        if ($event && $event->id_user == Auth::id()) {
            $tables = Table::where('id_event', $request->route('idevent'))->get();
            foreach ($tables as $t) {
                $numallergy = 0;
                $t->guests = Guest::where('id_table', $t->id_table)->get();
                foreach ($t->guests as $g) {
                    if ($g->id_meal != 0)
                        $g->meal = Meal::where('id_meal', $g->id_meal)->first();
                    if ($g->allergies)
                        $numallergy++;
                }
                $t->guestscount = Guest::where('id_table', $t->id_table)->count();
                $t->numallergy = $numallergy;
                $allmeals = Meal::where('id_event', $request->route('idevent'))->get();
                foreach ($allmeals as $meal) {
                    $ng = Guest::where('id_meal', $meal->id_meal)->where('id_table', $t->id_table)->count();
                    $meal->ng = $ng;
                }
                $t->mea = $allmeals;
            }

            $totm = Guest::where('id_event', $request->route('idevent'))
                ->where(function ($query) {
                    $query->where('checkin', 1)
                        ->whereNull('declined')
                        ->where(function ($subQuery) {
                            $subQuery->whereNotNull('id_meal')
                                ->orWhere('opened', 2);
                        })
                        ->orWhere(function ($subQuery) {
                            $subQuery->where(function ($subSubQuery) {
                                $subSubQuery->where('opened', 2)
                                    ->orWhereNotNull('id_meal');
                            })
                                ->whereNull('declined');
                        });
                })
                ->count();

            $totg = Guest::where('id_event', $request->route('idevent'))
                ->where(function ($query) {
                    $query->where('checkin', 1)
                        ->whereNull('declined')
                        ->where(function ($subQuery) {
                            $subQuery->whereNotNull('id_meal')
                                ->orWhere('opened', 2);
                        })
                        ->orWhere(function ($subQuery) {
                            $subQuery->where(function ($subSubQuery) {
                                $subSubQuery->where('opened', 2)
                                    ->orWhereNotNull('id_meal');
                            })
                                ->whereNull('declined');
                        });
                })
                ->count();

            $totguests = $totg;




            $totguestseated = Guest::where('id_event', $request->route('idevent'))->where('id_table', '<>', 0)->count();
            $totfrees = $totguests - $totguestseated;

            $totallerseated = Guest::where('id_event', $request->route('idevent'))->where('allergies', 1)->where('id_table', '<>', 0)->count();

            $allmeals = Meal::where('id_event', $request->route('idevent'))->get();
            foreach ($allmeals as $meal) {
                $ng = Guest::where('id_meal', $meal->id_meal)->where('id_table', '<>', 0)->count();
                $meal->ng = $ng;
            }
            return \Barryvdh\DomPDF\Facade::loadView('pdf', ['tables' => $tables, 'event' => $event, 'totguestseated' => $totguestseated, 'totallerseated' => $totallerseated, 'allmeals' => $allmeals, 'totfrees' => $totfrees, 'totguests' => $totguests])->stream('tables.pdf'); //, compact('data')   ->save('/var/www/html/pmao/public/pdftest/pippo.pdf');
            //return view('pdf')->with('tables',$tables)->with('event',$event);
        } else
            return redirect('/');
    }

}
