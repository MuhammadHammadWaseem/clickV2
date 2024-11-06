<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;
    protected $table = "website_settings";
    protected $fillable = [
        'id_event',
        'bride_name_color',
        'groom_name_color',
        'and_symbol_color',
        'event_date_color',
        'font_style',
        'event_name_color',
    ];

}
