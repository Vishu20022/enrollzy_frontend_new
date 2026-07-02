<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MentorProfile;
use App\Models\MentorMentorshipDetail;
use App\Models\MentorMenteeLevel;

class MentorMentorshipController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = $user->mentorProfile;
        
        $mentorship = ($profile && $profile->mentorshipDetail) ? $profile->mentorshipDetail : new MentorMentorshipDetail();
        
        $mentee_levels = MentorMenteeLevel::where('status', 1)->get();
        
        return view('mentor.profile.mentorship', compact('profile', 'mentorship', 'user', 'mentee_levels'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $profile = $user->mentorProfile;

        if (!$profile) {
            $profile = MentorProfile::create(['user_id' => $user->id]);
        }

        $request->validate([
            'areas_of_mentorship' => 'nullable|string', // JSON string from JS
            'target_mentee_levels' => 'nullable|array',
            'session_formats' => 'nullable|array',
            'session_durations' => 'nullable|array',
            'preferred_platform' => 'nullable|string|max:255',
            'mentoring_style' => 'nullable|string',
        ]);

        $areas = [];
        if ($request->filled('areas_of_mentorship')) {
            $areas = json_decode($request->areas_of_mentorship, true) ?? [];
        }

        $data = [
            'areas_of_mentorship' => $areas,
            'target_mentee_levels' => $request->input('target_mentee_levels', []),
            'session_formats' => $request->input('session_formats', []),
            'session_durations' => $request->input('session_durations', []),
            'preferred_platform' => $request->input('preferred_platform'),
            'mentoring_style' => $request->input('mentoring_style'),
        ];

        if ($profile->mentorshipDetail) {
            $profile->mentorshipDetail->update($data);
        } else {
            $profile->mentorshipDetail()->create($data);
        }

        return redirect()->route('mentor.profile.mentorship')->with('success', 'Mentorship details updated successfully.');
    }
}
