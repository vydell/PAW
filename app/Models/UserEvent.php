<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserEvent extends Pivot
{
    protected $table = 'users_events';
    protected $fillable = ['user_id', 'event_id', 'checked_in', 'reminder_set'];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_events', 'event_id', 'user_id')
            ->withPivot(['checked_in', 'reminder_set'])
            ->withTimestamps();
    }
}
