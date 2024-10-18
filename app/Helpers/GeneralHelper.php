<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class GeneralHelper
{
    // Set event ID in the session
    public static function setEventId($id)
    {
        Session::put('event_id', $id);
    }

    // Get event ID from the session
    public static function getEventId()
    {
        return Session::get('event_id');
    }

    // Check if event ID is set
    public static function hasEventId()
    {
        return Session::has('event_id');
    }
}
