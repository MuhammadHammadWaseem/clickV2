<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_data', 'subusa', 'subcan', 'tps', 'tvq'
    ];

    protected $table = 'datas';
    protected $primaryKey = 'id_data';
    public $timestamps = false;
}
