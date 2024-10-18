<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_event',
        'id_user',
        'type',
        'type_id',
        'id_animation',
        'coupon_code',
        'name',
        'guestCanSelectSeats',
        'date',
        'bridefname',
        'bridelname',
        'bridesummary',
        'groomfname',
        'groomlname',
        'groomsummary',
        'summary',
        'boolcerimony',
        'ceraddress',
        'cercountry',
        'cerprovince',
        'cercity',
        'cerpc',
        'certime',
        'cerdesc',
        'cerimg',
        'boolreception',
        'recaddress',
        'reccountry',
        'recprovince',
        'reccity',
        'recpc',
        'rectime',
        'recdesc',
        'recimg',
        'boolparty',
        'parname',
        'paraddress',
        'parcountry',
        'parprovince',
        'parcity',
        'parpc',
        'partime',
        'pardesc',
        'parimg',
        'imggroom',
        'imgbride',
        'imgplan',
        'mainimage',
        'transfer_type',
        'transfer_link',
        'atitle',
        'asubtitle',
        'atext',
        'ititle',
        'isubtitle',
        'itext',
        'mtitle',
        'msubtitle',
        'mtext',
        'code',
        'paid',
        'json',
    ];

    protected $table = "events";
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
}
