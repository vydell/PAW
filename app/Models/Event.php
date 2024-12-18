<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $table = 'events';
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['organizers_id', 'judul', 'deskripsi', 'tipe', 'tanggal_mulai', 'lokasi', 'slot_terisi', 'tanggal_akhir'];

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

    // Assuming you have a 'created_at' field
    public function getFormattedStartAttribute()
    {
        // Format the datetime in the desired format
        return Carbon::parse($this->tanggal_mulai)->format('j F Y H:i');
    }

    public function getFormattedEndAttribute()
    {
        return Carbon::parse($this->tanggal_akhir)->format('j F Y H:i');
    }
}
