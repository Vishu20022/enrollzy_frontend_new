<?php

namespace App\Http\Controllers;

use App\Models\ExpertSlot;
use App\Models\Booking;
use App\Models\Payment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // 1. Check if student is logged in
        if (!Auth::check()) {
            return response()->json(['error' => 'Please login to book an appointment.'], 401);
        }

        // Handle dynamic mentor slots
        if (is_string($request->slot_id) && str_starts_with($request->slot_id, 'mentor|')) {
            $parts = explode('|', $request->slot_id);
            if (count($parts) === 5) {
                $mentorId = $parts[1];
                $date = $parts[2];
                $startTime = $parts[3];
                $endTime = $parts[4];
                
                $mentor = \App\Models\MentorProfile::with('pricingDetail')->find($mentorId);
                
                if ($mentor) {
                    $slot = ExpertSlot::firstOrCreate([
                        'expert_id' => $mentorId, // Storing mentor_id in expert_id
                        'date' => $date,
                        'start_time' => $startTime,
                    ], [
                        'end_time' => $endTime,
                        'status' => 'available',
                        'cost' => $mentor->pricingDetail ? $mentor->pricingDetail->fee_30_min : 0,
                        'mode' => 'video'
                    ]);
                    
                    // Replace the string ID with the real database ID
                    $request->merge(['slot_id' => $slot->id]);
                }
            }
        }

        $request->validate([
            'slot_id' => 'required|exists:expert_slots,id',
            'description' => 'nullable|string|max:500',
        ]);

        $slot = ExpertSlot::findOrFail($request->slot_id);

        // 2. Check if slot is available
        if ($slot->status !== 'available') {
            return response()->json(['error' => 'This slot is no longer available.'], 422);
        }

        // 3. Calculate Fees
        $isMentor = is_string($request->slot_id) && str_starts_with($request->slot_id, 'mentor|') || ($request->provider_type === 'expert' && \App\Models\MentorProfile::find($slot->expert_id));
        if ($isMentor) {
            $commission = \App\Models\MentorCommission::first();
            $platformFeePercent = $commission ? $commission->commission_percentage : 15;
            $platformFee = ($slot->cost * $platformFeePercent) / 100;
            $expertEarning = $slot->cost - $platformFee;
            $breakdown = [
                'total_amount' => $slot->cost,
                'platform_total_deduction' => $platformFee,
                'platform_fee_base' => $platformFee,
                'net_expert_earning' => $expertEarning,
                'applied_type' => 'percentage',
                'applied_rate' => $platformFeePercent,
                'applied_gst_rate' => 0,
                'applied_tds_rate' => 0,
            ];
        } else {
            $commissionService = new \App\Services\CommissionService();
            $breakdown = $commissionService->calculateStrict($slot->expert, $slot->cost);
        }
        
        $amount = $breakdown['total_amount'];
        $platformFee = $breakdown['platform_total_deduction'];
        
        // 4. Create Booking
        $booking = Booking::create([
            'booking_id' => 'BK-' . strtoupper(Str::random(10)), // Double check, model boot might handle this but explicit is fine or relies on model
            'user_id' => Auth::id(),
            'expert_id' => $slot->expert_id,
            'slot_id' => $slot->id,
            'booking_date' => now(),
            'status' => 'confirmed', 
            'amount' => $amount,
            
            // Commission Fields
            'platform_fee' => $breakdown['platform_fee_base'],
            'expert_earning' => $breakdown['net_expert_earning'],
            
            'applied_commission_type' => $breakdown['applied_type'],
            'applied_commission_rate' => $breakdown['applied_rate'],
            'applied_gst_rate' => $breakdown['applied_gst_rate'],
            'applied_tds_rate' => $breakdown['applied_tds_rate'],
            'commission_breakdown' => $breakdown,
            
            'payment_status' => 'paid', 
            'notes' => $request->description,
        ]);

        // 5. Create Mock Payment
        Payment::create([
            'transaction_id' => 'TXN-' . strtoupper(Str::random(12)),
            'booking_id' => $booking->id,
            'user_id' => Auth::id(),
            'amount' => $amount,
            'currency' => 'INR',
            'gateway' => 'mock_gateway',
            'status' => 'success',
        ]);

        // 6. Mark slot as booked
        $slot->status = 'booked';
        $slot->save();

        return response()->json(['success' => 'Session booked successfully! You can view it in My Bookings.']);
    }

    public function myBookings()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $appointments = Booking::where('user_id', Auth::id())->with(['expert', 'mentor', 'slot'])->latest()->get();
        return view('pages.my-bookings', compact('appointments')); // Will need to update view name or content
    }
}





