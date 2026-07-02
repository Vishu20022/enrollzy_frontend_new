<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MentorExperience;
use App\Models\MentorProfile;
use App\Models\MentorIndustry;

class MentorProfessionalController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = $user->mentorProfile;
        
        $experiences = $profile ? $profile->experiences()->orderByDesc('is_current')->orderByDesc('start_year')->get() : collect([]);
        $industries = MentorIndustry::where('status', 1)->get();
        
        return view('mentor.profile.professional', compact('profile', 'experiences', 'user', 'industries'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $profile = $user->mentorProfile;

        if (!$profile) {
            $profile = MentorProfile::create(['user_id' => $user->id]);
        }

        $request->validate([
            'experiences' => 'nullable|array',
            'experiences.*.id' => 'nullable|exists:mentor_experiences,id',
            'experiences.*.job_title' => 'required|string|max:255',
            'experiences.*.company' => 'required|string|max:255',
            'experiences.*.industry' => 'required|string|max:255',
            'experiences.*.years_of_experience' => 'required|string|max:255',
            'experiences.*.start_year' => 'required|integer|min:1900|max:' . date('Y'),
            'experiences.*.end_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'experiences.*.linkedin_url' => 'nullable|url|max:255',
            'experiences.*.achievements' => 'nullable|string',
        ]);

        $incomingIds = [];
        $experiencesData = $request->input('experiences', []);
        
        foreach ($experiencesData as $index => $expData) {
            $isCurrent = isset($expData['is_current']) && $expData['is_current'] == '1';
            
            $data = [
                'job_title' => $expData['job_title'],
                'company' => $expData['company'],
                'industry' => $expData['industry'],
                'years_of_experience' => $expData['years_of_experience'],
                'start_year' => $expData['start_year'],
                'end_year' => $isCurrent ? null : ($expData['end_year'] ?? null),
                'is_current' => $isCurrent,
                'linkedin_url' => $expData['linkedin_url'] ?? null,
                'achievements' => $expData['achievements'] ?? null,
            ];

            if (!empty($expData['id'])) {
                $incomingIds[] = $expData['id'];
                $experience = MentorExperience::where('mentor_profile_id', $profile->id)
                    ->where('id', $expData['id'])
                    ->first();
                
                if ($experience) {
                    $experience->update($data);
                }
            } else {
                $experience = $profile->experiences()->create($data);
                $incomingIds[] = $experience->id;
            }
        }

        // Delete experiences that were removed in the UI
        $profile->experiences()->whereNotIn('id', $incomingIds)->delete();

        return redirect()->route('mentor.profile.professional')->with('success', 'Professional details updated successfully.');
    }
}
