<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $availabilities = Availability::with('room')
            ->orderBy('date', 'asc')
            ->get();
        
        return view('Availability.index', compact('availabilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = \App\Models\Room::all();
        return view('Availability.create', compact('rooms'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'date' => 'required|date',
        'room_id' => 'required|exists:rooms,id',
        'is_available' => 'required|boolean',
    ]);

    Availability::create($validated);

    return redirect()->route('availability.index')
        ->with('success', '予約枠を作成しました。');
}

    /**
     * Display the specified resource.
     */
    public function show(Availability $availability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Availability $availability)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Availability $availability)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Availability $availability)
    {
        //
    }
}
