<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    use HasFactory;
    protected $table = "event_type";

    protected $primaryKey = "id_eventtype";

    protected $guarded = [];

    public function events() {
        return $this->hasMany(Event::class, 'type_id', 'id_eventtype');
    }
    
}
