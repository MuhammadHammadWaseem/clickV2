<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\DB;

class CheckPackageAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $eventId = GeneralHelper::getEventId();
        $packageEvent = DB::table('package_event')->where('event_id', $eventId)->where('package_id', 3)->first();
        if (!$packageEvent) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
