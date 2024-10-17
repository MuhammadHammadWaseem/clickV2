<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_event','guestCanSelectSeats', 'id_user', 'type', 'name', 'date', 'created_at', 'updated_at',
    ];    protected $table = "events";
   

}
