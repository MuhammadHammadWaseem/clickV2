<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_packages')
        ->withPivot(['start_date', 'end_date', 'price_paid'])
            ->withTimestamps();
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'package_event', 'package_id', 'event_id')
            ->withPivot(['price_paid', 'start_date', 'end_date'])
            ->withTimestamps();
    }


}
