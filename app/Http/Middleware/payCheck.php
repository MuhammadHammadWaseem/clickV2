<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helpers\GeneralHelper;
use App\Models\Event;

class payCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentEventId = GeneralHelper::getEventId();
        $event = Event::find($currentEventId);
        if($event && $event->paid == 1){
            return $next($request);
        }else{
            return redirect()->route('panel.event.pay.index',['id'=> $currentEventId])->with('error', 'Payment is required to access this page.');
        }
    }
}
