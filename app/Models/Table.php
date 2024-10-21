<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $table = "tables";
    protected $fillable = [
    'name','number','guest_number','id_event'
    ];
    protected $primaryKey = 'id_table';
    public $timestamps = false;
}
