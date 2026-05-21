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

        $request->validate([
            'slot_id' => 'required|exists:expert_slots,id',
            'description' => 'nullable|string|max:500',
        ]);

        $slot = ExpertSlot::findOrFail($request->slot_id);

        // 2. Check if slot is available
        if ($slot->status !== 'available') {
            return response()->json(['error' => 'This slot is no longer available.'], 422);
        }

        // 3. Calculate Fees using CommissionService
        $commissionService = new \App\Services\CommissionService();
        $breakdown = $commissionService->calculateStrict($slot->expert, $slot->cost);
        
        $amount = $breakdown['total_amount'];
        $platformFee = $breakdown['platform_total_deduction']; // Use total deduction (Fee + GST) as platform share? 
        // Logic check: User prompt said: 
        // "platform_fee = session_price × commission_rate"
        // "expert_earning = session_price − platform_fee − tax"
        // Wait, normally Platform Fee is arguably Revenue. GST is tax collected.
        // My Service calculates: 'platform_fee_base' (Revenue), 'gst_on_fee' (Tax), 'platform_total_deduction' (Revenue+Tax).
        // The 'platform_fee' column in DB usually implies the Application's Share effectively.
        // Let's store 'platform_fee_base' as platform_fee, but we need to track GST somewhere. 
        // Or store 'platform_total_deduction' as platform_fee? 
        // User formula: platform_fee = session_price * rate. This usually implies base fee.
        // User formula: expert_earning = session_price - platform_fee - tax. (Tax here likely GST on fee + maybe TDS).
        // My service `net_expert_earning` handles all this.
        
        // I will trust my Service's `net_expert_earning` for `expert_earning` column.
        // For `platform_fee` column, I will use `platform_fee_base`.
        // The `amount` is `total_amount`.
        
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
        $appointments = Booking::where('user_id', Auth::id())->with(['expert', 'slot'])->latest()->get();
        return view('pages.my-bookings', compact('appointments')); // Will need to update view name or content
    }
}
