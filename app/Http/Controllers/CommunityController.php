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

    public function test()
    {
        $experts = \App\Models\Expert::latest()->get();
        $site_alumni = \App\Models\Alumni::where('status', true)->orderBy('sort_order')->orderBy('created_at', 'desc')->get();
        $faqs = \App\Models\Faq::orderBy('sort_order')->get();
        $testimonials = \App\Models\Testimonial::latest()->get();
        $blogs = \App\Models\Blog::with('category')->latest()->take(8)->get();
        $organisations = \App\Models\Organisation::with([
            'courses' => function ($query) {
                $query->where('status', true)->with('course')->orderBy('sort_order');
            }
        ])->where('status', true)->get();
        $site_settings = \App\Models\Setting::first();
        $is_show_full_banner = $site_settings->is_show_full_banner ?? 0;
        $hero_sliders = \App\Models\HeroSlider::where('is_active', true)
            ->when($is_show_full_banner == 1, function ($query) {
                return $query->where('image_type', 'Full Banner');
            })
            ->when($is_show_full_banner == 0, function ($query) {
                return $query->where(function($q) {
                    $q->where('image_type', '!=', 'Full Banner')->orWhereNull('image_type');
                });
            })
            ->orderBy('sort_order')
            ->get();
        $video_testimonials = \App\Models\VideoTestimonial::where('is_active', true)->orderBy('sort_order')->get();
        $noteworthy_categories = \App\Models\NoteworthyCategory::with([
            'mentions' => function ($query) {
                $query->where('status', true)->orderBy('sort_order');
            }
        ])->where('status', true)->orderBy('sort_order')->get();
        $unique_courses = \App\Models\Course::where('status', true)->orderBy('sort_order')->orderBy('name')->get();
        $homepage_sections = \App\Models\HomepageSection::where('is_visible', true)->orderBy('sort_order')->get();
        $home_services = \App\Models\HomeService::where('status', true)->orderBy('sort_order')->get();
        $home_benefits = \App\Models\HomeBenefit::where('status', true)->orderBy('sort_order')->get();
        $trending_skills = \App\Models\TrendingSkill::where('status', true)->orderBy('sort_order')->get();
        $company_marquees = \App\Models\CompanyMarquee::where('status', true)->orderBy('sort_order')->get();
        $exams = \App\Models\Exam::where('status', 'Active')->get();

        return view('pages.test', compact(
            'experts', 'site_alumni', 'faqs', 'testimonials', 'blogs', 'organisations', 
            'hero_sliders', 'video_testimonials', 'noteworthy_categories', 'unique_courses', 
            'homepage_sections', 'home_services', 'home_benefits', 'trending_skills', 'company_marquees', 'exams'
        ));
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
