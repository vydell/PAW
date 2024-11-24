<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCheckin extends Model
{
    use HasFactory;

    protected $fillable = ['users_events_events_id', 'users_events_users_id', 'checkin_at'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'users_events_events_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_events_users_id');
    }
}
