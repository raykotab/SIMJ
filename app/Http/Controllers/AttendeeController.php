<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function index()
    {
        $attendees = Attendee::all();
        return view('attendees.index', compact('attendees'));
    }

    public function create()
    {
        return view('attendees.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,event_id',
            'user_id' => 'required|exists:users,user_id',
        ]);

        Attendee::create($validatedData);

        return redirect()->route('attendees.index')->with('success', 'Attendee created successfully.');
    }

    public function show(Attendee $attendee)
    {
        return view('attendees.show', compact('attendee'));
    }

    public function edit(Attendee $attendee)
    {
        return view('attendees.edit', compact('attendee'));
    }

    public function update(Request $request, Attendee $attendee)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,event_id',
            'user_id' => 'required|exists:users,user_id',
        ]);

        $attendee->update($validatedData);

        return redirect()->route('attendees.index')->with('success', 'Attendee updated successfully.');
    }

    public function destroy(Attendee $attendee)
    {
        $attendee->delete();

        return redirect()->route('attendees.index')->with('success', 'Attendee deleted successfully.');
    }
}


