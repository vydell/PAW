<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserEvent extends Pivot
{
    protected $table = 'users_events';
    protected $fillable = ['users_id', 'events_id', 'checked_in', 'reminder_set'];
}
