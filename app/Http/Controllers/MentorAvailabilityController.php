<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MentorProfile;
use App\Models\MentorAvailabilityDetail;

class MentorAvailabilityController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = $user->mentorProfile;
        
        $availability = ($profile && $profile->availabilityDetail) ? $profile->availabilityDetail : new MentorAvailabilityDetail();
        
        return view('mentor.profile.availability', compact('profile', 'availability', 'user'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $profile = $user->mentorProfile;

        if (!$profile) {
            $profile = MentorProfile::create(['user_id' => $user->id]);
        }

        $request->validate([
            'timezone' => 'nullable|string|max:255',
            'slots' => 'nullable|string', // JSON string from JS
            'advance_notice' => 'nullable|string|max:255',
            'max_sessions' => 'nullable|integer|min:0',
            'pause_bookings' => 'nullable|boolean',
            'unavailability_dates' => 'nullable|string',
        ]);

        $slots = [];
        if ($request->filled('slots')) {
            $slots = json_decode($request->slots, true) ?? [];
        }

        $data = [
            'timezone' => $request->input('timezone'),
            'slots' => $slots,
            'advance_notice' => $request->input('advance_notice'),
            'max_sessions' => $request->input('max_sessions'),
            'pause_bookings' => $request->has('pause_bookings') ? true : false,
            'unavailability_dates' => $request->input('unavailability_dates'),
        ];

        if ($profile->availabilityDetail) {
            $profile->availabilityDetail->update($data);
        } else {
            $profile->availabilityDetail()->create($data);
        }

        return redirect()->route('mentor.profile.availability')->with('success', 'Availability updated successfully.');
    }
}
