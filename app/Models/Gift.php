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
    ];
    public $timestamps = false;

    protected $table = "gifts";
}
