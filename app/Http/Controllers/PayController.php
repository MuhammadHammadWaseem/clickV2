<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Code;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\Log;
use App\Models\Event;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendPackageMail;

class PayController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();
        $packages = Package::all();
        session()->start();
        $eventId = GeneralHelper::getEventId();
        session(['event_id' => $eventId]);
        Log::info('Session data before redirect', ['event_id' => session('event_id')]);

        // Fetch the user's purchased package for the event
        $purchasedPackages = DB::table('package_event')
            ->join('packages', 'package_event.package_id', '=', 'packages.id')
            ->where('package_event.event_id', $eventId)
            ->where('package_event.start_date', '<=', now())
            ->select('package_event.*', 'packages.name', 'packages.price', 'packages.features', 'packages.description')
            ->get();

        $highestPurchasedPackage = $purchasedPackages->sortByDesc('price_paid')->first();

        // Get the current package for this event, if any
        $eventPackage = \DB::table('package_event')
            ->join('packages', 'package_event.package_id', '=', 'packages.id')
            ->where('package_event.event_id', $eventId)
            ->where('package_event.start_date', '<=', now())
            // ->where('package_event.end_date', '>=', now())
            ->select('packages.id as package_id', 'packages.name as package_name', 'packages.price as package_price', 'package_event.price_paid')
            ->orderByDesc('package_event.id')
            ->first();

        $availablePackages = DB::table('packages')
            ->select('packages.*')
            ->get()
            ->map(function ($package) use ($purchasedPackages, $highestPurchasedPackage) {
                // Check if the package is already purchased
                $isPurchased = $purchasedPackages->contains('package_id', $package->id);

                // Calculate upgrade price only if not already purchased
                $package->upgrade_price = !$isPurchased && $highestPurchasedPackage
                    ? max(0, $package->price - $highestPurchasedPackage->price_paid)
                    : 0;

                // Disable lower-tier packages if a higher-tier package is purchased
                $package->is_disabled = $highestPurchasedPackage && $package->price < $highestPurchasedPackage->price_paid;

                $package->is_purchased = $isPurchased;
                return $package;
            });


        return view('Panel.dashboard.pay', compact('packages', 'eventPackage', 'availablePackages', 'purchasedPackages'));
    }

    public function paydatas(Request $request)
    {
        $eventId = GeneralHelper::getEventId();
        if ($request->has('id') && $request->id != null) {
            // Get the current package for this event, if any

            // Fetch the user's purchased package for the event
            $purchasedPackages = DB::table('package_event')
                ->join('packages', 'package_event.package_id', '=', 'packages.id')
                ->where('package_event.event_id', $eventId)
                ->where('package_event.start_date', '<=', now())
                ->select('package_event.*', 'packages.name', 'packages.price', 'packages.features', 'packages.description')
                ->get();

            $highestPurchasedPackage = $purchasedPackages->sortByDesc('price_paid')->first();

            // Get the current package for this event, if any
            $eventPackage = \DB::table('package_event')
                ->join('packages', 'package_event.package_id', '=', 'packages.id')
                ->where('package_event.event_id', $eventId)
                ->where('package_event.start_date', '<=', now())
                // ->where('package_event.end_date', '>=', now())
                ->select('packages.id as package_id', 'packages.name as package_name', 'packages.price as package_price', 'package_event.price_paid')
                ->orderByDesc('package_event.created_at')
                ->first();

            // Fetch all packages and calculate the upgrade price
            $package = DB::table('packages')
                ->where('id', $request->id)
                ->select('packages.*')
                ->first();

                $packageId = $request->id;

            if (!$package) {
                return redirect()->back()->with('error', 'Package not found');
            }

            if ($eventPackage) {
                $package->price = max(0, $package->price - $highestPurchasedPackage->price_paid);
            }

        } else {
            $package = null;
            $packageId = null;
        }
        $datas = Data::where('id_data', 1)->first();

        $subUsa = floatval($datas->subusa1 . '.' . $datas->subusa2);
        $tpsUsa = floatval($datas->tpsusa1 . '.' . $datas->tpsusa2);
        $tvqUsa = floatval($datas->tvqusa1 . '.' . $datas->tvqusa2);


        $subCA = floatval($datas->subcan1 . '.' . $datas->subcan2);
        $tpsCA = floatval($datas->tpscan1 . '.' . $datas->tpscan2);
        $tvqCA = floatval($datas->tvqcan1 . '.' . $datas->tvqcan2);

        $couponMsg = "";
        $discount = 0;
        $subUsao = 0;
        $subCAo = 0;

        if ($request->has('code') && $request->code != '' && $request->id == null) {
            $code = Code::where('code', $request->code)->first();
            $code = DB::table('coupon')->where(['code' => $request->code])->get();
            //return $code[0]->discount;
            $current = Carbon::now();
            $dateNow = $current->format('Y-m-d');

            if ($code) {
                if ($dateNow >= $code[0]->start_date && $dateNow <= $code[0]->expirydate) {
                    $couponUsed = DB::table('events')->where(['coupon_code' => $request->code])->count();
                    if ($couponUsed < $code[0]->count) {
                        $discount = $code[0]->discount;

                        $subUsao = $subUsa - ($subUsa / 100 * $code[0]->discount);
                        $subUsao = number_format($subUsao, 2);
                        $subCAo = $subCA - ($subCA / 100 * $code[0]->discount);
                        $subCAo = number_format($subCAo, 2);
                        $subUsa = $subUsa - ($subUsa / 100 * $code[0]->discount);
                        $subCA = $subCA - ($subCA / 100 * $code[0]->discount);
                        DB::table('events')->where(['id_event' => $eventId])->update(['coupon_code' => $request->code]);
                    } else {
                        $couponMsg = "Invalid Coupon";
                    }
                } else {
                    $couponMsg = "Invalid Coupon";
                }
            }
        } else {

            $discount = 0;
            $subUsao = 0;
            $subCAo = 0;
        }

        if ($request->has('id') && $request->id != null && $request->code == null) {
            $subUsao = $package->price;
            $subCAo = $package->price;
            $subUsa = $package->price;
            $subCA = $package->price;
        }


        if ($request->has('id') && $request->id != null && $request->code != null) {
            $code = DB::table('coupon')->where(['code' => $request->code])->get();
            $current = Carbon::now();
            $dateNow = $current->format('Y-m-d');


            $subUsao = $package->price;
            $subCAo = $package->price;
            $subUsa = $package->price;
            $subCA = $package->price;

            if ($code && count($code) > 0) {
                if ($dateNow >= $code[0]->start_date && $dateNow <= $code[0]->expirydate) {
                    $couponUsed = DB::table('events')->where(['coupon_code' => $request->code])->count();
                    if ($couponUsed < $code[0]->count) {
                        $discount = $code[0]->discount;

                        $subUsao = $subUsa - ($subUsa / 100 * $code[0]->discount);
                        $subUsao = number_format($subUsao, 2);
                        $subCAo = $subCA - ($subCA / 100 * $code[0]->discount);
                        $subCAo = number_format($subCAo, 2);
                        $subUsa = $subUsa - ($subUsa / 100 * $code[0]->discount);
                        $subCA = $subCA - ($subCA / 100 * $code[0]->discount);
                        DB::table('events')->where(['id_event' => $eventId])->update(['coupon_code' => $request->code]);
                    } else {
                        $subUsao = $package->price;
                        $subCAo = $package->price;
                        $subUsa = $package->price;
                        $subCA = $package->price;
                        $couponMsg = "Invalid Coupon";
                    }
                } else {
                    $subUsao = $package->price;
                    $subCAo = $package->price;
                    $subUsa = $package->price;
                    $subCA = $package->price;
                    $couponMsg = "Invalid Coupon";
                }
            }else{
                $subUsao = $package->price;
                $subCAo = $package->price;
                $subUsa = $package->price;
                $subCA = $package->price;
                $couponMsg = "Invalid Coupon";
            }

        } else {
            $discount = 0;
            $subUsao = 0;
            $subCAo = 0;
        }


        $totusa = number_format($subUsa + (($subUsa / 100) * $tpsUsa) + (($subUsa / 100) * $tvqUsa), 2);
        $totcan = number_format($subCA + (($subCA / 100) * $tpsCA) + (($subCA / 100) * $tvqCA), 2);


        $totusaexp = explode(".", $totusa);
        $totcanexp = explode(".", $totcan);

        // $linkusa = "https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=info%40clickinvitation%2ecom&lc=EN&item_name=click%2dinvitation&amount=" . $totusaexp[0] . "%2e" . $totusaexp[1] . "&button_subtype=services&no_note=1&no_shipping=1&rm=1&return=https%3a%2f%2fclickinvitation%2ecom%2fevent%2f" . $eventId . "%2fthankyou%3famount=" . $totusaexp[0] . "." . $totusaexp[1] . "&currency_code=USD&bn=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHosted";

        // $linkcan = "https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=info%40clickinvitation%2ecom&lc=EN&item_name=click%2dinvitation&amount=" . $totcanexp[0] . "%2e" . $totcanexp[1] . "&button_subtype=services&no_note=1&no_shipping=1&rm=1&return=https%3a%2f%2fclickinvitation%2ecom%2fevent%2f" . $eventId . "%2fthankyou%3famount=" . $totcanexp[0] . "." . $totcanexp[1] . "&currency_code=CAD&bn=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHosted";

        $linkusa = "https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=info%40clickinvitation%2ecom&lc=EN&item_name=click%2dinvitation&amount=" . $totusaexp[0] . "%2e" . $totusaexp[1] . "&button_subtype=services&no_note=1&no_shipping=1&rm=1&return=https%3a%2f%2fclickinvitation%2ecom%2fevent%2f" . $eventId . "%2fthankyou%3famount=" . $totusaexp[0] . "." . $totusaexp[1] . "&package_id=" . $packageId . "&currency_code=USD&bn=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHosted";

        $linkcan = "https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=info%40clickinvitation%2ecom&lc=EN&item_name=click%2dinvitation&amount=" . $totcanexp[0] . "%2e" . $totcanexp[1] . "&button_subtype=services&no_note=1&no_shipping=1&rm=1&return=https%3a%2f%2fclickinvitation%2ecom%2fevent%2f" . $eventId . "%2fthankyou%3famount=" . $totcanexp[0] . "." . $totcanexp[1] . "&package_id=" . $packageId . "&currency_code=CAD&bn=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHosted";


        $newTvqUSA = number_format((($subUsa / 100) * $tvqUsa), 2, ".", "");
        $newTvqCA = number_format((($subCA / 100) * $tvqCA), 2, ".", "");

        $newTpsCan = number_format((($subCA / 100) * $tpsCA), 2, ".", "");
        $newTpsUSA = number_format((($subUsa / 100) * $tpsUsa), 2, ".", "");

        return '[{"subcan":"' . $subCA . ' CAD", "tpscan":"' . $newTpsCan . ' CAD", "tvqcan":"' . $newTvqCA . ' CAD", 
                  "subusa":"' . $subUsa . ' USD", "tpsusa":"' . $newTpsUSA . ' USD", "tvqusa":"' . $newTvqUSA . ' USD",
                  "totusa":"' . $totusa . ' USD","totcan":"' . $totcan . ' CAD", "linkcan":"' . $linkcan . ' CAD","linkusa":"' . $linkusa . ' CAD","discount":"' . $discount . '%","subusao":"' . $subUsao . ' USD","subcano":"' . $subCAo . ' CAD","couponMsg":"' . $couponMsg . '"}]';
    }

    public function payConfirm(Request $request)
    {
        $requestData = $request->all();
        Log::info('Session data after redirect', ['event_id' => session('event_id')]);
        return view('Panel.dashboard.paySucccess', compact("requestData"));

    }

    public function thankyou($eventId, Request $request)
    {
        if ($request->get('PayerID') != null) {
            $user = Auth::user();
            $userEvent = $user->events()->where('id_event', $eventId)->firstOrFail();
            $selectedPackage = Package::findOrFail($request->get('package_id'));

            // Check if the user already has a package linked to this event
            $currentEventPackage = $userEvent->packages()->where('package_id', $selectedPackage->id)->first();

            // If a package already exists
            if ($currentEventPackage) {
                // Check if the selected package is an upgrade
                if ($selectedPackage->price > $currentEventPackage->pivot->price_paid) {
                    // Calculate the upgrade cost
                    $upgradeCost = $selectedPackage->price - $currentEventPackage->pivot->price_paid;

                    // Update the package for the event
                    $userEvent->packages()->updateExistingPivot($currentEventPackage->id, [
                        'package_id' => $selectedPackage->id,
                        'price_paid' => $selectedPackage->price,
                        'start_date' => now(),
                        'updated_at' => now(),
                    ]);

                    return redirect()->route('panel.event.pay.index', ['id' => $eventId])
                        ->with('success', "Package upgraded to {$selectedPackage->name}. Upgrade cost: $${upgradeCost}.");
                }

                // If the same or a lower package is selected, prevent redundant purchases
                return redirect()->route('panel.event.pay.index', ['id' => $eventId])
                    ->with('error', "You already have the {$currentEventPackage->name} package for this event.");
            }

            // If no package exists for this event, create a new record
            $userEvent->packages()->attach($selectedPackage->id, [
                'price_paid' => $selectedPackage->price,
                'start_date' => now(),
                'end_date' => null, // You can define a specific duration for the package here
                'created_at' => now(),
            ]);

            // Optionally link the package to the user (if required for global access)
            if (!$user->packages()->where('package_id', $selectedPackage->id)->exists()) {
                $user->packages()->attach($selectedPackage->id, [
                    'price_paid' => $selectedPackage->price,
                    'start_date' => now(),
                    'end_date' => null,
                ]);
            }

            if ($selectedPackage->id == 3) {
                SendPackageMail::dispatch($user, $selectedPackage, $eventId);
                Log::info("Email dispatched for package ID 3 to {$user->email}");
            }

            return redirect()->route('panel.event.pay.index', ['id' => $eventId])
                ->with('success', "You have successfully purchased the {$selectedPackage->name}.");
        } else {
            return redirect()->route('panel.event.pay.index', ['id' => $eventId])
                ->with('error', "Payment verification failed. Please try again.");
        }
    }

    // public function thankyou($eventId, Request $request)
    // {
    //     $user = Auth::user();
    //     $userEvent = $user->events()->where('id_event', $eventId)->firstOrFail();

    //     $selectedPackage = Package::findOrFail(3);

    //     // Check if the user already has a package linked to this event
    //     $currentEventPackage = $userEvent->packages()->where('package_id', $selectedPackage->id)->first();

    //     // If a package already exists
    //     if ($currentEventPackage) {
    //         // Check if the selected package is an upgrade
    //         if ($selectedPackage->price > $currentEventPackage->pivot->price_paid) {
    //             // Calculate the upgrade cost
    //             $upgradeCost = $selectedPackage->price - $currentEventPackage->pivot->price_paid;

    //             // Update the package for the event
    //             $userEvent->packages()->updateExistingPivot($currentEventPackage->id, [
    //                 'package_id' => $selectedPackage->id,
    //                 'price_paid' => $selectedPackage->price,
    //                 'start_date' => now(),
    //                 'updated_at' => now(),
    //             ]);

    //             return redirect()->route('panel.event.pay.index', ['id' => $eventId])
    //                 ->with('success', "Package upgraded to {$selectedPackage->name}. Upgrade cost: $${upgradeCost}.");
    //         }

    //         // If the same or a lower package is selected, prevent redundant purchases
    //         return redirect()->route('panel.event.pay.index', ['id' => $eventId])
    //             ->with('error', "You already have the {$currentEventPackage->name} package for this event.");
    //     }

    //     // If no package exists for this event, create a new record
    //     $userEvent->packages()->attach($selectedPackage->id, [
    //         'price_paid' => $selectedPackage->price,
    //         'start_date' => now(),
    //         'end_date' => null, // You can define a specific duration for the package here
    //         'created_at' => now(),
    //     ]);

    //     // Optionally link the package to the user (if required for global access)
    //     if (!$user->packages()->where('package_id', $selectedPackage->id)->exists()) {
    //         $user->packages()->attach($selectedPackage->id, [
    //             'price_paid' => $selectedPackage->price,
    //             'start_date' => now(),
    //             'end_date' => null,
    //         ]);
    //     }
    //     if ($selectedPackage->id == 3) {
    //         SendPackageMail::dispatch($user, $selectedPackage,$eventId);
    //         Log::info("Email dispatched for package ID 3 to {$user->email}");
    //     }

    //     return redirect()->route('panel.event.pay.index', ['id' => $eventId])
    //         ->with('success', "You have successfully purchased the {$selectedPackage->name}.");
    // }

    public function exportcsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $id = $request->id_event;
        $file = $request->file('csv_file');

        // Find the event by its ID
        $event = Event::findOrFail($id);

        // Check if a file already exists for this event
        if ($event->event_data) {
            $existingFilePath = public_path('storage/uploads/' . $event->event_data);

            // Delete the existing file if it exists
            if (file_exists($existingFilePath)) {
                unlink($existingFilePath);
            }
        }

        // Generate a unique file name for the new file
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Store the new file in the public directory (e.g., 'public/uploads')
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        // Update the event record with the new file name
        $event->event_data = $fileName;
        $event->save();

        // Return a success response
        return response()->json([
            'message' => 'File uploaded and updated successfully!',
            'file_path' => asset('storage/' . $filePath),
        ], 200);
    }

    public function uploadcsv(Request $request)
    {
        return view('Panel.dashboard.upload-csv');
    }



}
