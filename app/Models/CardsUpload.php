<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardsUpload extends Model
{
    use HasFactory;
    protected $table = "cards_upload";
    protected $fillable = ['id','id_eventtype','img','type'];
    protected $primaryKey = "id";
}
