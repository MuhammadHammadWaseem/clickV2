<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $fillable = [
        'titleGuest',
        'name',
        'email',
        'phone',
        'whatsapp',
        'mainguest',
        'parent_id_guest',
        'notes',
        'id_meal',
        'allergies',
        'id_table',
        'id_event',
        'code',
        'declined',
        'checkin',
        'members_number',
        'opened',
        'qrCode',
    ];
    protected $table = "guests";
    protected $primaryKey = 'id_guest';
    public $timestamps = false;
}
