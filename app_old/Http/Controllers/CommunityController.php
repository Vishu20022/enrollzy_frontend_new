<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunityCategory;
use App\Models\CommunityQuestion;
use App\Models\CommunityReply;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function index(Request $request)
    {
        $categories = CommunityCategory::all();
        
        // Fetch Top Contributors (Users with most questions + replies)
        $topContributors = \App\Models\User::withCount(['community_questions', 'community_replies'])
            ->get()
            ->sortByDesc(function($user) {
                return $user->community_questions_count + $user->community_replies_count;
            })
            ->take(5);

        // Fetch Applications for Admissions (Latest active organisations)
        $applications = \App\Models\Organisation::where('status', true)->latest()->take(5)->get();

        $query = CommunityQuestion::with(['user', 'category', 'likes', 'replies.user', 'replies.likes'])
            ->where('is_verified', true)
            ->latest();

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('search')) {
            $query->where('question_text', 'like', '%' . $request->search . '%');
        }

        $questions = $query->paginate(15);
        return view('pages.students-community', compact('categories', 'questions', 'topContributors', 'applications'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'question_text' => 'required|string|min:10',
            'category_id' => 'required|exists:community_categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['question_text', 'category_id']);
        $data['user_id'] = Auth::id();
        $data['is_verified'] = false; // Admin must verify

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/community'), $imageName);
            $data['image'] = 'images/community/' . $imageName;
        }

        CommunityQuestion::create($data);

        return back()->with('success', 'Your question has been submitted and is awaiting admin verification.');
    }
}
