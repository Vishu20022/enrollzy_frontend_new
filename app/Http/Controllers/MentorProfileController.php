<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MentorProfile;
use App\Models\MentorLanguage;

class MentorProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        $profile = $user->mentorProfile ?? new MentorProfile();
        $languages = MentorLanguage::where('status', 1)->get();
        $selectedLanguages = $profile->id ? $profile->languages->pluck('id')->toArray() : [];

        return view('mentor.profile.edit', compact('profile', 'languages', 'selectedLanguages', 'user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|max:2048',
            'professional_headline' => 'required|string|max:255',
            'short_bio' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'state_country' => 'required|string|max:255',
            'languages' => 'required|array',
            'languages.*' => 'exists:mentor_languages,id',
        ]);

        $user = auth()->user();
        $profile = $user->mentorProfile ?? new MentorProfile(['user_id' => $user->id]);

        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->professional_headline = $request->professional_headline;
        $profile->short_bio = $request->short_bio;
        $profile->city = $request->city;
        $profile->state_country = $request->state_country;

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/mentor_photos'), $fileName);
            $path = 'uploads/mentor_photos/' . $fileName;

            if ($profile->exists) {
                $profile->profile_photo = $path;
            } else {
                $profile->profile_photo = $path;
            }
        }
        
        $profile->save();
        $profile->languages()->sync($request->languages);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
