<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['organizers_id', 'judul', 'deskripsi', 'tipe', 'tanggal_mulai', 'lokasi', 'slot_terisi'];

    public function organizer()
    {
        return $this->belongsTo(organizer::class, 'organizers_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_events')->using(UserEvent::class)->withPivot('checked_in', 'reminder_set');
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class, 'users_events_events_id', 'id');
    }

    public function checkins()
    {
        return $this->hasMany(EventCheckin::class, 'users_events_events_id', 'id');
    }
}
