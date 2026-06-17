<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expert;
use App\Models\Alumni;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Organisation;
use App\Models\Testimonial;
use App\Models\HeroSlider;
use App\Models\VideoTestimonial;
use App\Models\NoteworthyCategory;
use App\Models\OrganisationCourse;
use App\Models\Course;
use App\Models\TrendingSkill;
use App\Models\CompanyMarquee;
use App\Models\Campus;
use App\Models\Facility;
use App\Models\Page;

class PageController extends Controller
{
    public function compare()
    {
        $campuses = Campus::with([
            'organisation',
            'departments' => function ($q) {
                $q->where('status', true);
            },
            'departments.courses' => function ($q) {
                $q->where('status', true)->with(['course', 'programLevel', 'specialization', 'entranceExam']);
            }
        ])->where('status', true)->get();

        $allFacilities = Facility::where('status', 1)->get();

        return view('pages.compare', compact('campuses', 'allFacilities'));
    }

    public function home()
    {
        $experts = Expert::latest()->get();
        // Fetch Alumni for Talk to Alumni section
        $site_alumni = Alumni::where('status', true)->orderBy('sort_order')->orderBy('created_at', 'desc')->get();

        $faqs = Faq::orderBy('sort_order')->get();
        $testimonials = Testimonial::latest()->get();
        $blogs = Blog::with('category')->latest()->take(8)->get();
        $organisations = Organisation::with([
            'courses' => function ($query) {
                $query->where('status', true)->with('course')->orderBy('sort_order');
            }
        ])->where('status', true)->get();
        // dd($organisations);
        $site_settings = \App\Models\Setting::first();
        $is_show_full_banner = $site_settings->is_show_full_banner ?? 0;

        $campuses = Campus::with([
            'organisation',
            'departments' => function ($q) {
                $q->where('status', true);
            },
            'departments.courses' => function ($q) {
                $q->where('status', true)->with(['course', 'programLevel', 'specialization', 'entranceExam']);
            }
        ])->where('status', true)->get();

        $hero_sliders = HeroSlider::where('is_active', true)
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
        $video_testimonials = VideoTestimonial::where('is_active', true)->orderBy('sort_order')->get();
        $noteworthy_categories = NoteworthyCategory::with([
            'mentions' => function ($query) {
                $query->where('status', true)->orderBy('sort_order');
            }
        ])->where('status', true)->orderBy('sort_order')->get();

        // Unique courses from the Master List
        $unique_courses = Course::where('status', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        // Fetch Homepage Sections
        $homepage_sections = \App\Models\HomepageSection::where('is_visible', true)
            ->orderBy('sort_order')
            ->get();

        $home_services = \App\Models\HomeService::where('status', true)->orderBy('sort_order')->get();
        $home_benefits = \App\Models\HomeBenefit::where('status', true)->orderBy('sort_order')->get();
        
        // Dynamic Trending Skills & Marquee
        $trending_skills = TrendingSkill::where('status', true)->orderBy('sort_order')->get();
        $company_marquees = CompanyMarquee::where('status', true)->orderBy('sort_order')->get();
        $institute_marquees = \App\Models\InstituteMarquee::where('status', true)->orderBy('sort_order')->get();
        $exams = \App\Models\DynamicExam::where('status', 'Active')->get();

        return view('pages.home', compact('experts', 'site_alumni', 'faqs', 'testimonials', 'blogs', 'organisations', 'hero_sliders', 'video_testimonials', 'noteworthy_categories', 'unique_courses', 'homepage_sections', 'home_services', 'home_benefits', 'trending_skills', 'company_marquees', 'institute_marquees', 'exams', 'is_show_full_banner', 'campuses'));
    }

    public function blog()
    {
        $blogs = Blog::with('category')->latest()->get();
        return view('blog.blog-listing', compact('blogs'));
    }

    public function blogDetail($slug)
    {
        $blog = Blog::with('category')->where('slug', $slug)->firstOrFail();
        $recent_blogs = Blog::where('id', '!=', $blog->id)->latest()->take(5)->get();
        return view('blog.blog-detail', compact('blog', 'recent_blogs'));
    }

    public function degrees()
    {
        $faqs = Faq::orderBy('sort_order')->get();
        $pageTitle = 'Degrees';
        return view('pages.degrees', compact('faqs', 'pageTitle'));
    }

    public function studentsCommunity()
    {
        return view('pages.students-community');
    }

    public function myLearning()
    {
        $faqs = Faq::orderBy('sort_order')->get();
        $pageTitle = 'My Learning';
        return view('pages.my-learning', compact('faqs', 'pageTitle'));
    }

    public function help()
    {
        return view('pages.help');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function loginOtp()
    {
        return view('auth.login-otp');
    }

    public function experts()
    {
        $experts = Expert::latest()->get();
        return view('pages.experts.index', compact('experts'));
    }

    public function expertDetail($id)
    {
        $expert = Expert::findOrFail($id);
        return view('pages.experts.show', compact('expert'));
    }

    public function alumni()
    {
        $site_alumni = Alumni::where('status', true)->orderBy('sort_order')->latest()->get();
        return view('pages.alumni.index', compact('site_alumni'));
    }

    public function alumnusDetail($id)
    {
        $alumnus = Alumni::findOrFail($id);
        return view('pages.alumni.show', compact('alumnus'));
    }

    public function organisations()
    {
        $organisations = Organisation::where('status', true)
            ->whereIn('organisation_type_id', [1, 2])
            ->orderBy('name')
            ->get();
        return view('pages.organisations.index', compact('organisations'));
    }

    public function organisationDetail($slug)
    {
        $organisation = Organisation::with([
            'courses.course',
            'courses.programLevel',
            'courses.specialization',
            'courses.entranceExam',
            'courses.campus',
            'campuses',
            'awards',
            'sports',
            'academicResults',
            'feeStructures',
            'organisationType',
            'organisationSubType',
            'accreditations',
            'admissionRoutes'
        ])->where('slug', $slug)->where('status', true)->firstOrFail();
        $languages = \App\Models\Language::where('status', 1)->pluck('title', 'id');

        return view('pages.organisations.show', compact('organisation', 'languages'));
    }

    public function examDetail($slug)
    {
        $exam = \App\Models\DynamicExam::with('sections')->where('slug', $slug)->firstOrFail();
        return view('pages.exams.show', compact('exam'));
    }
    public function courseDetail($slug)
    {
        $course = \App\Models\Course::with(['programLevel', 'streamOffered', 'discipline'])->where('slug', $slug)->firstOrFail();
        return view('pages.courses.show', compact('course'));
    }

    public function dynamicPage($slug)
    {
        $page = \App\Models\Page::where('slug', $slug)->where('status', 1)->firstOrFail();
        return view('pages.dynamic-page', compact('page'));
    }
}
