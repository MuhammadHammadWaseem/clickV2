<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CheckEventPackage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, $feature): Response
    {
        // $currentEventId = GeneralHelper::getEventId();
        $currentEventId = $request->route('id');
        GeneralHelper::setEventId($currentEventId);
        $user = Auth::user();

        $event = \DB::table('events')->where('id_event', $currentEventId)->where('id_user', $user->id)->first();

        if (!$event) {
            return redirect()->route('panel.index')->with('error', 'Invalid event.');
        }

        $freeTrialEnd = Carbon::parse($event->created_at)->addDays(5);

        // Step 1: Check if user has purchased any package for the event
        $eventPackage = DB::table('package_event')
            ->join('packages', 'package_event.package_id', '=', 'packages.id')
            ->where('package_event.event_id', $currentEventId)
            ->where('package_event.start_date', '<=', now())
            ->select('packages.*') // Get package details
            ->orderBy('package_event.package_id', 'desc') // Prefer Comprehensive over Basic
            ->first();

        // Step 2: Free trial logic
        if (now()->lessThanOrEqualTo($freeTrialEnd)) {
            $basicFeatures = ['General Info', 'Webpage', 'Meals', 'Gift Suggestions', 'Invitation', 'Guest List'];

            if ($eventPackage) {
                // If a package is purchased during the free trial, grant access based on that package
                $allowedFeatures = json_decode($eventPackage->features, true);

                if (in_array($feature, $allowedFeatures)) {
                    return $next($request); // Allow access to purchased package features
                } else {
                    return redirect()->route('panel.event.pay.index', ['id' => $currentEventId])
                        ->with('error', "The '{$feature}' feature is not available in your package.");
                }
            }

            // No package purchased, limit to basic features
            if (in_array($feature, $basicFeatures)) {
                return $next($request); // Allow basic features during free trial
            } else {
                return redirect()->route('panel.event.pay.index', ['id' => $currentEventId])
                    ->with('error', "The '{$feature}' feature is not available during the free trial.");
            }
        }

        // Step 3: Post free trial logic - Access based on purchased package
        if ($eventPackage) {
            $allowedFeatures = json_decode($eventPackage->features, true);

            if (in_array($feature, $allowedFeatures)) {
                return $next($request); // Allow access to purchased package features
            } else {
                return redirect()->route('panel.event.pay.index', ['id' => $currentEventId])
                    ->with('error', "The '{$feature}' feature is not available in your package.");
            }
        }

        // No valid package, redirect to purchase page
        return redirect()->route('panel.event.pay.index', ['id' => $currentEventId])
            ->with('error', 'You need a package to access this event.');
    }


}
