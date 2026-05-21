<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lead;

class LeadController extends Controller
{
    public function index()
    {
        $expert = Auth::guard('expert')->user();
        
        $leads = Lead::where('leadable_type', 'App\Models\Expert')
            ->where('leadable_id', $expert->id)
            ->latest()
            ->paginate(10);
            
        return view('expert.leads.index', compact('leads'));
    }

    public function updateStatus(Request $request, Lead $lead)
    {
        // Ensure the lead belongs to this expert
        if ($lead->leadable_id != Auth::guard('expert')->id() || $lead->leadable_type != 'App\Models\Expert') {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:New,Contacted,Converted,Rejected'
        ]);

        $lead->update(['status' => $request->status]);

        return back()->with('success', 'Lead status updated successfully.');
    }
}
