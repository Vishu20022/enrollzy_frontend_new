<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MentorProfile;
use App\Models\MentorPricingDetail;
use App\Models\MentorCommission;
use App\Models\MentorDegree;
use App\Models\MentorIndustry;
use App\Models\MentorMenteeLevel;

class MentorPricingController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = $user->mentorProfile;
        
        $pricing = ($profile && $profile->pricingDetail) ? $profile->pricingDetail : new MentorPricingDetail();
        
        $commissionConfig = MentorCommission::first();
        $globalCommission = $commissionConfig->commission_percentage ?? 15;
        $priorityOrder = $commissionConfig->priority_order ?? ['degree', 'industry', 'level', 'global'];

        $commissionRate = null;

        foreach ($priorityOrder as $priority) {
            if ($priority === 'degree') {
                if ($profile && $profile->educations->count() > 0) {
                    $degreeNames = $profile->educations->pluck('degree_type')->toArray();
                    $degreeCommission = MentorDegree::whereIn('name', $degreeNames)
                        ->whereNotNull('commission_percentage')
                        ->orderByDesc('commission_percentage')
                        ->value('commission_percentage');
                    if ($degreeCommission !== null) {
                        $commissionRate = $degreeCommission;
                        break;
                    }
                }
            } elseif ($priority === 'industry') {
                if ($profile && $profile->experiences->count() > 0) {
                    $industryNames = $profile->experiences->pluck('industry')->toArray();
                    $industryCommission = MentorIndustry::whereIn('name', $industryNames)
                        ->whereNotNull('commission_percentage')
                        ->orderByDesc('commission_percentage')
                        ->value('commission_percentage');
                    if ($industryCommission !== null) {
                        $commissionRate = $industryCommission;
                        break;
                    }
                }
            } elseif ($priority === 'level') {
                if ($profile && $profile->mentorshipDetail) {
                    $levels = $profile->mentorshipDetail->target_mentee_levels;
                    if (is_string($levels)) {
                        $levels = json_decode($levels, true);
                    }
                    if (is_array($levels) && count($levels) > 0) {
                        $levelCommission = MentorMenteeLevel::whereIn('name', $levels)
                            ->whereNotNull('commission_percentage')
                            ->orderByDesc('commission_percentage')
                            ->value('commission_percentage');
                        if ($levelCommission !== null) {
                            $commissionRate = $levelCommission;
                            break;
                        }
                    }
                }
            } elseif ($priority === 'global') {
                $commissionRate = $globalCommission;
                break;
            }
        }

        if ($commissionRate === null) {
            $commissionRate = $globalCommission;
        }

        return view('mentor.profile.pricing', compact('profile', 'pricing', 'user', 'commissionRate'));
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
            'upi_qr_code' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bank_account_holder_name' => 'nullable|string|max:255',
            'bank_account_number' => 'nullable|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'bank_ifsc_code' => 'nullable|string|max:255',
        ]);

        $data = [
            'fee_30_min' => $request->input('fee_30_min'),
            'fee_60_min' => $request->input('fee_60_min'),
            'offer_free_first_session' => $request->has('offer_free_first_session') ? true : false,
            'pro_bono_sessions' => $request->input('pro_bono_sessions', 0),
            'payout_method' => $request->input('payout_method'),
            'upi_id' => $request->input('payout_method') === 'UPI' ? $request->input('upi_id') : null,
            'bank_account_holder_name' => $request->input('payout_method') === 'Bank Transfer' ? $request->input('bank_account_holder_name') : null,
            'bank_account_number' => $request->input('payout_method') === 'Bank Transfer' ? $request->input('bank_account_number') : null,
            'bank_name' => $request->input('payout_method') === 'Bank Transfer' ? $request->input('bank_name') : null,
            'bank_ifsc_code' => $request->input('payout_method') === 'Bank Transfer' ? $request->input('bank_ifsc_code') : null,
        ];

        if ($request->input('payout_method') === 'UPI') {
            if ($request->hasFile('upi_qr_code')) {
                $file = $request->file('upi_qr_code');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/qr_codes'), $filename);
                $data['upi_qr_code'] = 'uploads/qr_codes/' . $filename;
            } elseif ($profile->pricingDetail) {
                $data['upi_qr_code'] = $profile->pricingDetail->upi_qr_code;
            }
        } else {
            $data['upi_qr_code'] = null;
        }

        if ($profile->pricingDetail) {
            $profile->pricingDetail->update($data);
        } else {
            $profile->pricingDetail()->create($data);
        }

        return redirect()->route('mentor.profile.pricing')->with('success', 'Pricing details updated successfully.');
    }
}
