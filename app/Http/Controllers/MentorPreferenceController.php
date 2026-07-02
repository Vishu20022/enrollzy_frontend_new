<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MentorProfile;
use App\Models\MentorPreference;

class MentorPreferenceController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = $user->mentorProfile;
        
        $preference = ($profile && $profile->preference) ? $profile->preference : new MentorPreference([
            'new_booking_request' => true,
            'session_reminders' => true,
            'new_review_posted' => true,
            'weekly_analytics_digest' => true,
            'platform_announcements' => true,
            'whatsapp_notifications' => false,
            'notification_email' => $user->email, // default to account email
        ]);
        
        return view('mentor.profile.preferences', compact('profile', 'preference', 'user'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $profile = $user->mentorProfile;

        if (!$profile) {
            $profile = MentorProfile::create(['user_id' => $user->id]);
        }

        $request->validate([
            'notification_email' => 'nullable|email|max:255',
            'whatsapp_number' => 'nullable|string|max:255',
        ]);

        $data = [
            'new_booking_request' => $request->has('new_booking_request'),
            'session_reminders' => $request->has('session_reminders'),
            'new_review_posted' => $request->has('new_review_posted'),
            'weekly_analytics_digest' => $request->has('weekly_analytics_digest'),
            'platform_announcements' => $request->has('platform_announcements'),
            'whatsapp_notifications' => $request->has('whatsapp_notifications'),
            'notification_email' => $request->input('notification_email'),
            'whatsapp_number' => $request->input('whatsapp_number'),
        ];

        if ($profile->preference) {
            $profile->preference->update($data);
        } else {
            $profile->preference()->create($data);
        }

        return redirect()->route('mentor.profile.preferences')->with('success', 'Preferences updated successfully.');
    }
}
