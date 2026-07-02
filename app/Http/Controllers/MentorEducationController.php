<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MentorEducation;
use App\Models\MentorProfile;
use Illuminate\Support\Facades\Storage;

class MentorEducationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = $user->mentorProfile;

        // If no profile exists, pass an empty collection of educations
        $educations = $profile ? $profile->educations()->get() : collect([]);
        $degrees = \App\Models\MentorDegree::where('status', 1)->get();

        return view('mentor.profile.education', compact('profile', 'educations', 'user', 'degrees'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $profile = $user->mentorProfile;

        if (!$profile) {
            // Lazily create the profile so we can attach educations
            $profile = MentorProfile::create(['user_id' => $user->id]);
        }

        $request->validate([
            'educations' => 'nullable|array',
            'educations.*.id' => 'nullable|exists:mentor_educations,id',
            'educations.*.degree_type' => 'required|string|max:255',
            'educations.*.specialisation' => 'nullable|string|max:255',
            'educations.*.institution' => 'required|string|max:255',
            'educations.*.year_of_graduation' => 'required|integer|min:1900|max:' . (date('Y') + 5),
            'certificates.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120', // 5MB max
        ]);

        $incomingIds = [];
        $educationsData = $request->input('educations', []);
        
        foreach ($educationsData as $index => $eduData) {
            if (!empty($eduData['id'])) {
                $incomingIds[] = $eduData['id'];
                $education = MentorEducation::where('mentor_profile_id', $profile->id)
                    ->where('id', $eduData['id'])
                    ->first();
                
                if ($education) {
                    $education->update([
                        'degree_type' => $eduData['degree_type'],
                        'specialisation' => $eduData['specialisation'],
                        'institution' => $eduData['institution'],
                        'year_of_graduation' => $eduData['year_of_graduation'],
                    ]);

                    if ($request->hasFile("certificates.$index")) {
                        // Delete old file if it exists and is in the uploads directory
                        if ($education->degree_certificate && file_exists(public_path($education->degree_certificate))) {
                            @unlink(public_path($education->degree_certificate));
                        }
                        $file = $request->file("certificates.$index");
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/mentor_certificates'), $fileName);
                        $path = 'uploads/mentor_certificates/' . $fileName;
                        $education->update(['degree_certificate' => $path]);
                    }
                }
            } else {
                $education = $profile->educations()->create([
                    'degree_type' => $eduData['degree_type'],
                    'specialisation' => $eduData['specialisation'],
                    'institution' => $eduData['institution'],
                    'year_of_graduation' => $eduData['year_of_graduation'],
                ]);

                if ($request->hasFile("certificates.$index")) {
                    $file = $request->file("certificates.$index");
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/mentor_certificates'), $fileName);
                    $path = 'uploads/mentor_certificates/' . $fileName;
                    $education->update(['degree_certificate' => $path]);
                }

                $incomingIds[] = $education->id;
            }
        }

        // Delete educations that were removed in the UI
        $profile->educations()->whereNotIn('id', $incomingIds)->get()->each(function($edu) {
            if ($edu->degree_certificate) {
                Storage::disk('public')->delete($edu->degree_certificate);
            }
            $edu->delete();
        });

        return redirect()->route('mentor.profile.education')->with('success', 'Education details updated successfully.');
    }
}
