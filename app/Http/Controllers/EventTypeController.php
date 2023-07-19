<?php

namespace App\Http\Controllers;

use App\Models\EventType;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    public function index(): View
    {
        $types = EventType::all();

        return view('types.index', \compact('types'));
    }

    public function create(): View
    {
        return view('types.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name',
            'event_id',
            'background',
            'border',
            'text_color'
        ]);

        EventType::Create($validatedData);

        return redirect()->route('types.index')->with('success', 'Style created successfully.');
    }
}
