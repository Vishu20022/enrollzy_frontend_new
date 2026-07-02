<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MentorProfile;
use App\Models\MentorPricingDetail;

class MentorPricingController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = $user->mentorProfile;
        
        $pricing = ($profile && $profile->pricingDetail) ? $profile->pricingDetail : new MentorPricingDetail();
        
        return view('mentor.profile.pricing', compact('profile', 'pricing', 'user'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $profile = $user->mentorProfile;

        if (!$profile) {
            $profile = MentorProfile::create(['user_id' => $user->id]);
        }

        $request->validate([
            'fee_30_min' => 'nullable|numeric|min:0',
            'fee_60_min' => 'nullable|numeric|min:0',
            'offer_free_first_session' => 'nullable|boolean',
            'pro_bono_sessions' => 'nullable|integer|min:0',
            'payout_method' => 'nullable|string|max:255',
            'upi_id' => 'nullable|string|max:255',
        ]);

        $data = [
            'fee_30_min' => $request->input('fee_30_min'),
            'fee_60_min' => $request->input('fee_60_min'),
            'offer_free_first_session' => $request->has('offer_free_first_session') ? true : false,
            'pro_bono_sessions' => $request->input('pro_bono_sessions', 0),
            'payout_method' => $request->input('payout_method'),
            'upi_id' => $request->input('payout_method') === 'UPI' ? $request->input('upi_id') : null,
        ];

        if ($profile->pricingDetail) {
            $profile->pricingDetail->update($data);
        } else {
            $profile->pricingDetail()->create($data);
        }

        return redirect()->route('mentor.profile.pricing')->with('success', 'Pricing details updated successfully.');
    }
}
