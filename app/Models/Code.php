<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_code',
        'code',
        'type',
        'expiredate',
        'remainusers',
        'discount',
    ];

    protected $table = 'codes';
    protected $primaryKey = 'id_code';
    public $timestamps = false;
}
