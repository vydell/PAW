<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\UserEvent;
use App\Models\EventCheckin;

class UserEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->get('event_filter');

        // Get events based on the filter
        $events = Event::when($filter, function ($query, $filter) {
            return $query->where('jenis', $filter);
        })->get();

        return view('events.index', compact('events'));
    }

    public function book(Request $request, $eventId)
    {
        $userId = Auth::user()->id;

        $alreadyBooked = UserEvent::where('user_id', $userId)
            ->where('event_id', $eventId)
            ->exists();

        if ($alreadyBooked) {
            return redirect()->back()->with('error', 'You have already booked this event.');
        }

        $event = Event::findOrFail($eventId);

        if ($event->slot_terisi >= $event->slot) {
            return redirect()->back()->with('error', 'No available slots for this event.');
        }

        UserEvent::create([
            'user_id' => $userId,
            'event_id' => $eventId,
            'checked_in' => false,
            'reminder_set' => false,
        ]);

        $event->increment('slot_terisi');

        return redirect()->back()->with('success', 'Event booked successfully!');
    }

    public function checkin(Request $request, $eventId)
    {
        $userId = Auth::user()->id;

        $existingCheckin = EventCheckin::where('events_id', $eventId)
            ->where('users_id', $userId)
            ->first();

        if ($existingCheckin) {
            return redirect()->back()->with('error', 'You are already checked in for this event.');
        }

        EventCheckin::insert([
            'users_id'  => $userId,
            'events_id' => $eventId,
            'checkin_at' => now(),
        ]);

        return redirect()->back()->with('success', 'You have successfully checked in.');
    }

    public function myBookings()
    {
        $user = Auth::user();

        $events = Event::whereHas('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get()->map(function ($event) use ($user) {
            $event->is_checked_in = EventCheckin::where('events_id', $event->id)
                ->where('users_id', $user->id)
                ->exists();
            return $event;
        });

        return view('dashboard.dashboard', compact('events'));
    }




    /**
     * Display the specified resource.
     */
    public function details(int $id)
    {
        // Fetch the event by ID
        $event = Event::find($id);

        // Check if the event exists
        if (!$event) {
            return response()->json([
                'message' => 'Event not found'
            ], 404);
        }

        return view('events.details', ['event' => $event]);
    }
}
