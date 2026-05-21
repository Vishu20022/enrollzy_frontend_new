<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\Payout;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayoutController extends Controller
{
    public function index()
    {
        $expert = Auth::guard('expert')->user();
        if (!$expert) {
            return redirect()->route('admin.login');
        }

        // Calculate Stats
        $totalEarnings = Booking::where('expert_id', $expert->id)
            ->where('payment_status', 'paid')
            ->sum('expert_earning');

        $paidOut = Payout::where('expert_id', $expert->id)
            ->where('status', 'processed')
            ->sum('amount');

        $pendingPayout = Payout::where('expert_id', $expert->id)
            ->where('status', 'pending')
            ->sum('amount');

        $availableBalance = $totalEarnings - $paidOut - $pendingPayout;

        $payouts = Payout::where('expert_id', $expert->id)->latest()->paginate(10);

        return view('expert.payouts.index', compact('payouts', 'totalEarnings', 'paidOut', 'availableBalance', 'pendingPayout'));
    }

    public function requestPayout(Request $request)
    {
        $expert = Auth::guard('expert')->user();

        $request->validate([
            'amount' => 'required|numeric|min:100',
        ]);

        // Recalculate available balance to be safe
        $totalEarnings = Booking::where('expert_id', $expert->id)
            ->where('payment_status', 'paid')
            ->sum('expert_earning');
        $paidOut = Payout::where('expert_id', $expert->id)
            ->where('status', 'processed')
            ->sum('amount');
        $pendingPayout = Payout::where('expert_id', $expert->id)
            ->where('status', 'pending')
            ->sum('amount');
        
        $availableBalance = $totalEarnings - $paidOut - $pendingPayout;

        if ($request->amount > $availableBalance) {
            return back()->withErrors(['amount' => 'Insufficient wallet balance.']);
        }

        Payout::create([
            'expert_id' => $expert->id,
            'amount' => $request->amount,
            'status' => 'pending',
            'period_start' => now()->startOfMonth(), // Just placeholders
            'period_end' => now(),
        ]);

        return back()->with('success', 'Payout request submitted successfully.');
    }
}
