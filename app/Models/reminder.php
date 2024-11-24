<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reminder extends Model
{
    use HasFactory;

    protected $fillable = ['users_events_events_id', 'users_events_users_id', 'reminder_time'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'users_events_events_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_events_users_id');
    }
}
