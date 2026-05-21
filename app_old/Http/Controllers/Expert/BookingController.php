<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $expert = Auth::guard('expert')->user();
        if (!$expert) {
            return redirect()->route('admin.login');
        }

        $bookings = $expert->bookings()
            ->with(['user', 'slot'])
            ->latest()
            ->paginate(10);

        return view('expert.bookings.index', compact('bookings'));
    }

    public function edit(Booking $booking)
    {
        $this->authorizeBooking($booking);
        return view('expert.bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $this->authorizeBooking($booking);

        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled,no-show',
            'meeting_link' => 'nullable|url',
        ]);

        $booking->update([
            'status' => $request->status,
            'meeting_link' => $request->meeting_link,
        ]);

        return redirect()->route('expert.bookings.index')->with('success', 'Booking updated successfully.');
    }

    private function authorizeBooking($booking)
    {
        $expert = Auth::guard('expert')->user();
        if (!$expert || $booking->expert_id !== $expert->id) {
            abort(403, 'Unauthorized action.');
        }
    }
}
