<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_meal', 'name', 'description', 'id_event',
    ];

    protected $table = 'meals';
    protected $primaryKey = 'id_meal';
    public $timestamps = false;
}
