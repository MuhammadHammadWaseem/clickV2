<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use HasFactory;
    protected $table = "photogallery";
    protected $primaryKey= "id_photogallery";
    public $timestamps = false;
}
