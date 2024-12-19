<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPayment extends Model
{
    use HasFactory;

    protected $table = 'event_payments';

    protected $fillable = [
        'id',
        'user_id',
        'user_name',
        'user_email',
        'event_id',
        'ssl_approval_code',
        'ssl_amount',
        'ssl_exp_date',
        'ssl_txn_id',
        'ssl_result_message',
        'ssl_txn_time',
        'created_at',
        'updated_at',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
