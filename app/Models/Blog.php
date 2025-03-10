<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','short_description','long_description','page_title','meta_tag','image','is_trending','is_popular','is_latest'];

    protected $table = 'blogs';
}
