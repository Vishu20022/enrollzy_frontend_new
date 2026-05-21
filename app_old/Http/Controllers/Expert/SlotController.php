<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\ExpertSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SlotController extends Controller
{
    public function index()
    {
        $expert = Auth::guard('expert')->user();
        $slots = $expert->slots()->orderBy('date')->orderBy('start_time')->paginate(10);
        return view('expert.slots.index', compact('slots'));
    }

    public function create()
    {
        return view('expert.slots.create');
    }

    public function store(Request $request)
    {
        $expert = Auth::guard('expert')->user();
        
        if ($request->type === 'bulk') {
            $request->validate([
                'start_date' => 'required|date|after_or_equal:today',
                'end_date'   => 'required|date|after_or_equal:start_date',
                'days'       => 'required|array|min:1',
                'start_time' => 'required',
                'end_time'   => 'required|after:start_time',
                'cost'       => 'required|numeric|min:0',
                'mode'       => 'required|in:video,audio,chat',
            ]);

            $startDate = \Carbon\Carbon::parse($request->start_date);
            $endDate = \Carbon\Carbon::parse($request->end_date);
            $count = 0;

            for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
                // 'Mon', 'Tue' format check
                if (in_array($date->format('D'), $request->days)) {
                    // Check duplicate
                    $exists = $expert->slots()
                        ->where('date', $date->format('Y-m-d'))
                        ->where('start_time', $request->start_time)
                        ->exists();

                    if (!$exists) {
                        $expert->slots()->create([
                            'date' => $date->format('Y-m-d'),
                            'start_time' => $request->start_time,
                            'end_time' => $request->end_time,
                            'status' => 'available',
                            'cost' => $request->cost,
                            'mode' => $request->mode,
                            'is_recurring' => true,
                            'recurring_day' => $date->format('l'),
                        ]);
                        $count++;
                    }
                }
            }

            return redirect()->route('expert.slots.index')->with('success', "$count slots generated successfully.");

        } else {
            // Single Slot
            $request->validate([
                'date' => 'required|date|after_or_equal:today',
                'start_time' => 'required',
                'end_time' => 'required|after:start_time',
                'cost' => 'required|numeric|min:0',
                'mode' => 'required|in:video,audio,chat',
            ]);

            $expert->slots()->create([
                'date' => $request->date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'status' => 'available',
                'cost' => $request->cost,
                'mode' => $request->mode,
            ]);

            return redirect()->route('expert.slots.index')->with('success', 'Slot created successfully.');
        }
    }

    public function edit(ExpertSlot $slot)
    {
        $this->authorizeSlot($slot);
        return view('expert.slots.edit', compact('slot'));
    }

    public function update(Request $request, ExpertSlot $slot)
    {
        $this->authorizeSlot($slot);

        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'cost' => 'required|numeric|min:0',
            'mode' => 'required|in:video,audio,chat',
            'status' => 'required|in:available,blocked', // experts cannot manually set to 'booked' generally
        ]);

        if ($slot->status === 'booked') {
            return back()->with('error', 'Cannot update a booked slot.');
        }

        $slot->update($request->only(['date', 'start_time', 'end_time', 'cost', 'mode', 'status']));

        return redirect()->route('expert.slots.index')->with('success', 'Slot updated successfully.');
    }

    public function destroy(ExpertSlot $slot)
    {
        $this->authorizeSlot($slot);

        if ($slot->status === 'booked') {
            return back()->with('error', 'Cannot delete a booked slot.');
        }

        $slot->delete();
        return redirect()->route('expert.slots.index')->with('success', 'Slot deleted successfully.');
    }

    private function authorizeSlot($slot)
    {
        $expert = Auth::guard('expert')->user();
        if (!$expert || $slot->expert_id !== $expert->id) {
            abort(403, 'Unauthorized action.');
        }
    }
}
