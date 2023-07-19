<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function index(): View
    {
        $attendees = Attendee::all();
        return view('attendees.index', compact('attendees'));
    }

    public function create(): View
    {
        return view('attendees.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,event_id',
            'user_id' => 'required|exists:users,user_id',
        ]);

        Attendee::create($validatedData);

        return redirect()->route('attendees.index')->with('success', 'Attendee created successfully.');
    }

    public function show(Attendee $attendee): View
    {
        return view('attendees.show', compact('attendee'));
    }

    public function edit(Attendee $attendee): View
    {
        return view('attendees.edit', compact('attendee'));
    }

    public function update(Request $request, Attendee $attendee): RedirectResponse
    {
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,event_id',
            'user_id' => 'required|exists:users,user_id',
        ]);

        $attendee->update($validatedData);

        return redirect()->route('attendees.index')->with('success', 'Attendee updated successfully.');
    }

    public function destroy(Attendee $attendee): RedirectResponse
    {
        $attendee->delete();

        return redirect()->route('attendees.index')->with('success', 'Attendee deleted successfully.');
    }
}


