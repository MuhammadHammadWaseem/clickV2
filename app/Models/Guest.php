<?php

namespace App\Models;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function meal()
    {
        return $this->belongsTo(Meal::class, 'id_meal');
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'id_table');
    }

}
