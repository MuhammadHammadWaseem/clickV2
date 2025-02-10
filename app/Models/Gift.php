<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;
    protected $primaryKey = "id_gift";
    protected $fillable = [
        'name',
        'description',
        'link',
        'id_event',
        'id_pick',
    ];
    public $timestamps = false;

    protected $table = "gifts";

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }

    public function picker()
    {
        return $this->belongsTo(User::class, 'id_pick', 'id');
    }

}
