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
        'is_bride_fname',
        'is_bride_lname',
        'is_groom_fname',
        'is_groom_lname',
        'is_symbol',
        'symbol',
        'is_heart',
        'is_date',
        'bride_name_color',
        'groom_name_color',
        'and_symbol_color',
        'event_date_color',
        'font_style',
        'event_name_color',

        'groomlnameSize',
        'groomfnameSize',
        'bridelnameSize',
        'bridefnameSize',
        'symbolSize',
        'dateSize',
    ];

}
