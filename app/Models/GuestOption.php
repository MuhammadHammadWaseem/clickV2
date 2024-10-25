<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestOption extends Model
{
    use HasFactory;
    protected $table = "guest_options";
    protected $fillable = [
        'event_id',
        'guest_id',
        'gift',
        'checkin',
        'photos',
        'website',
        'rsp'
    ];
}
