<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MentorProfile;
use App\Models\MentorVerification;

class MentorVerificationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = $user->mentorProfile;
        
        $verification = ($profile && $profile->verification) ? $profile->verification : new MentorVerification();
        
        // Auto check for LinkedIn match (if professional section has url)
        if ($profile && $profile->experiences->count() > 0 && $verification->linkedin_status == 'not_submitted') {
            $verification->linkedin_status = 'pending';
            $verification->save();
        }

        // Auto check for Degrees (if education section has degrees)
        if ($profile && $profile->educations->count() > 0 && $verification->degree_status == 'not_submitted') {
            $verification->degree_status = 'pending';
            $verification->save();
        }
        
        return view('mentor.profile.verification', compact('profile', 'verification', 'user'));
    }

    public function uploadGovId(Request $request)
    {
        $request->validate([
            'gov_id_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $user = auth()->user();
        $profile = $user->mentorProfile;
        if (!$profile) {
            $profile = MentorProfile::create(['user_id' => $user->id]);
        }
        
        $verification = $profile->verification ?: $profile->verification()->create([]);

        if ($request->hasFile('gov_id_file')) {
            $file = $request->file('gov_id_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/mentor_verifications'), $fileName);
            $path = 'uploads/mentor_verifications/' . $fileName;
            
            $verification->update([
                'gov_id_path' => $path,
                'gov_id_status' => 'pending'
            ]);
        }

        return redirect()->route('mentor.profile.verification')->with('success', 'Government ID uploaded successfully.');
    }

    public function initiateBackgroundCheck()
    {
        $user = auth()->user();
        $profile = $user->mentorProfile;
        if (!$profile) {
            $profile = MentorProfile::create(['user_id' => $user->id]);
        }
        
        $verification = $profile->verification ?: $profile->verification()->create([]);
        
        $verification->update(['background_check_status' => 'pending']);

        return redirect()->route('mentor.profile.verification')->with('success', 'Background check initiated.');
    }

    public function signAgreement()
    {
        $user = auth()->user();
        $profile = $user->mentorProfile;
        if (!$profile) {
            $profile = MentorProfile::create(['user_id' => $user->id]);
        }
        
        $verification = $profile->verification ?: $profile->verification()->create([]);
        
        $verification->update(['platform_agreement_signed' => true]);

        return redirect()->route('mentor.profile.verification')->with('success', 'Platform agreement signed.');
    }
}
