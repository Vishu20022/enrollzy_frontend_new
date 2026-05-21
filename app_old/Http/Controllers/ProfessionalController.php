<?php

namespace App\Http\Controllers;

use App\Models\AvailabilitySlot;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessionalController extends Controller
{
    public function dashboard()
    {
        $user = Auth::guard('expert')->user();
        $isExpert = true;

        if (!$user) {
            $user = Auth::guard('alumni')->user();
            $isExpert = false;
        }

        if (!$user) {
            abort(403);
        }
        
        if ($isExpert) {
            $slots = $user->slots()->orderBy('date')->orderBy('start_time')->get();
            $appointments = $user->bookings()
                ->with(['user', 'slot'])
                ->latest()
                ->get();
        } else {
            // Legacy logic for Alumni
            $slots = $user->availability_slots()->orderBy('date')->orderBy('start_time')->get();
            $appointments = Appointment::whereIn('availability_slot_id', $slots->pluck('id'))
                ->with(['user', 'availability_slot'])
                ->latest()
                ->get();
        }

        return view('professional.dashboard', compact('user', 'slots', 'appointments', 'isExpert'));
    }

    public function storeSlot(Request $request)
    {
        $user = Auth::guard('expert')->user() ?? Auth::guard('alumni')->user();
        if (!$user) {
            abort(403);
        }

        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        $user->availability_slots()->create([
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'open',
        ]);

        return back()->with('success', 'Availability slot added successfully.');
    }

    public function toggleSlotStatus(AvailabilitySlot $slot)
    {
        $user = Auth::guard('expert')->user() ?? Auth::guard('alumni')->user();
        
        // Security check
        if (!$user || $slot->provider_id !== $user->id || $slot->provider_type !== get_class($user)) {
            abort(403);
        }

        if ($slot->status === 'booked') {
            return back()->with('error', 'Cannot change status of a booked slot.');
        }

        $slot->status = ($slot->status === 'open') ? 'closed' : 'open';
        $slot->save();

        return back()->with('success', 'Slot status updated.');
    }

    public function deleteSlot(AvailabilitySlot $slot)
    {
        $user = Auth::guard('expert')->user() ?? Auth::guard('alumni')->user();

        if (!$user || $slot->provider_id !== $user->id || $slot->provider_type !== get_class($user)) {
            abort(403);
        }

        if ($slot->status === 'booked') {
            return back()->with('error', 'Cannot delete a booked slot.');
        }

        $slot->delete();
        return back()->with('success', 'Slot removed.');
    }

    public function updateAppointmentStatus(Request $request, Appointment $appointment)
    {
        $user = Auth::guard('expert')->user() ?? Auth::guard('alumni')->user();
        $slot = $appointment->availability_slot;

        if (!$user || $slot->provider_id !== $user->id || $slot->provider_type !== get_class($user)) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $appointment->status = $request->status;
        $appointment->save();

        return back()->with('success', 'Appointment status updated.');
    }
}
