<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\CommunityController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfessionalAuthController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteProtectionController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\CareerRoadmapController;

// Career Roadmap
Route::get('/career-roadmap', [CareerRoadmapController::class, 'index'])->name('career-roadmap');
Route::get('/career-roadmap/api/stage/{stageId}', [CareerRoadmapController::class, 'getStageDetails'])->name('career-roadmap.api.stage');
Route::get('/career-roadmap/api/stream/{streamId}', [CareerRoadmapController::class, 'getStreamDetails'])->name('career-roadmap.api.stream');

// 🛡️ Site Protection Wall
Route::get('/under-construction', [SiteProtectionController::class, 'index'])->name('site.protection.login');
Route::post('/under-construction', [SiteProtectionController::class, 'login'])->name('site.protection.login.submit');


// ✅ Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/login-otp', [PageController::class, 'loginOtp'])->name('login-otp');
Route::post('/login-otp', [AuthController::class, 'loginOtpSubmit'])->name('login.otp.submit');
Route::get('/verify-otp', [AuthController::class, 'showVerifyOtp'])->name('otp.verify');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('otp.verify.submit');

Route::post('/leads/submit', [LeadController::class, 'store'])->name('leads.submit');



Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ✅ Registration
Route::get('/register', [PageController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// ✅ Expert Auth & Dashboard (Legacy Login Redirected)
Route::prefix('expert')->group(function () {
    Route::get('/login', function () {
        return redirect()->route('login');
    })->name('login.expert');

    Route::middleware('auth:expert')->group(function () {
        Route::get('/dashboard', [ProfessionalController::class, 'dashboard'])->name('expert.dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('expert.logout');
    });
});

// ✅ Alumni Auth & Dashboard (Legacy Login Redirected)
Route::prefix('alumni')->group(function () {
    Route::get('/login', function () {
        return redirect()->route('login');
    })->name('login.alumni');

    Route::middleware('auth:alumni')->group(function () {
        Route::get('/dashboard', [ProfessionalController::class, 'dashboard'])->name('alumni.dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('alumni.logout');
    });
});

// ✅ Mentor Auth & Dashboard
Route::prefix('mentor')->group(function () {
    Route::get('/register', [\App\Http\Controllers\MentorAuthController::class, 'showRegisterForm'])->name('mentor.register');
    Route::post('/register', [\App\Http\Controllers\MentorAuthController::class, 'register'])->name('mentor.register.submit');
    
    Route::get('/login', [\App\Http\Controllers\MentorAuthController::class, 'showLoginForm'])->name('mentor.login');
    
    Route::get('/login-otp', [\App\Http\Controllers\MentorAuthController::class, 'showLoginForm'])->name('mentor.login-otp');
    Route::post('/login-otp', [\App\Http\Controllers\MentorAuthController::class, 'loginOtpSubmit'])->name('mentor.login.otp.submit');
    
    Route::get('/verify-otp', [\App\Http\Controllers\MentorAuthController::class, 'showVerifyOtp'])->name('mentor.otp.verify');
    Route::post('/verify-otp', [\App\Http\Controllers\MentorAuthController::class, 'verifyOtp'])->name('mentor.otp.verify.submit');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            if (auth()->user()->role !== 'mentor') {
                return redirect()->route('pages.home')->with('error', 'Unauthorized access.');
            }
            return redirect()->route('mentor.profile.edit');
        })->name('mentor.dashboard');

        Route::get('/profile', [\App\Http\Controllers\MentorProfileController::class, 'edit'])->name('mentor.profile.edit');
        Route::put('/profile', [\App\Http\Controllers\MentorProfileController::class, 'update'])->name('mentor.profile.update');

        Route::get('/education', [\App\Http\Controllers\MentorEducationController::class, 'index'])->name('mentor.profile.education');
        Route::post('/education', [\App\Http\Controllers\MentorEducationController::class, 'store'])->name('mentor.profile.education.store');
        Route::get('/professional', [\App\Http\Controllers\MentorProfessionalController::class, 'index'])->name('mentor.profile.professional');
        Route::post('/professional', [\App\Http\Controllers\MentorProfessionalController::class, 'store'])->name('mentor.profile.professional.store');
        Route::get('/mentorship', [\App\Http\Controllers\MentorMentorshipController::class, 'index'])->name('mentor.profile.mentorship');
        Route::post('/mentorship', [\App\Http\Controllers\MentorMentorshipController::class, 'store'])->name('mentor.profile.mentorship.store');
        Route::get('/availability', [\App\Http\Controllers\MentorAvailabilityController::class, 'index'])->name('mentor.profile.availability');
        Route::post('/availability', [\App\Http\Controllers\MentorAvailabilityController::class, 'store'])->name('mentor.profile.availability.store');
        Route::get('/pricing', [\App\Http\Controllers\MentorPricingController::class, 'index'])->name('mentor.profile.pricing');
        Route::post('/pricing', [\App\Http\Controllers\MentorPricingController::class, 'store'])->name('mentor.profile.pricing.store');
        Route::get('/verification', [\App\Http\Controllers\MentorVerificationController::class, 'index'])->name('mentor.profile.verification');
        Route::post('/verification/gov-id', [\App\Http\Controllers\MentorVerificationController::class, 'uploadGovId'])->name('mentor.profile.verification.gov_id');
        Route::post('/verification/background', [\App\Http\Controllers\MentorVerificationController::class, 'initiateBackgroundCheck'])->name('mentor.profile.verification.background');
        Route::post('/verification/agreement', [\App\Http\Controllers\MentorVerificationController::class, 'signAgreement'])->name('mentor.profile.verification.agreement');
        Route::get('/preferences', [\App\Http\Controllers\MentorPreferenceController::class, 'index'])->name('mentor.profile.preferences');
        Route::post('/preferences', [\App\Http\Controllers\MentorPreferenceController::class, 'store'])->name('mentor.profile.preferences.store');

        Route::post('/logout', [\App\Http\Controllers\MentorAuthController::class, 'logout'])->name('mentor.logout');
    });
});

// ✅ Shared Professional Management
Route::middleware(['auth:expert,alumni'])->group(function () {
    // Legacy Routes (keeping for backward compatibility if needed, or replace)
    /* 
    Route::post('/professional/slots', [ProfessionalController::class, 'storeSlot'])->name('professional.slots.store');
    Route::post('/professional/slots/{slot}/toggle', [ProfessionalController::class, 'toggleSlotStatus'])->name('professional.slots.toggle');
    Route::delete('/professional/slots/{slot}', [ProfessionalController::class, 'deleteSlot'])->name('professional.slots.delete');
    Route::post('/professional/appointments/{appointment}/status', [ProfessionalController::class, 'updateAppointmentStatus'])->name('professional.appointments.status');
    */

    // New Modular Routes
    // Lead Management
    Route::get('expert/leads', [\App\Http\Controllers\Expert\LeadController::class, 'index'])->name('expert.leads.index');
    Route::patch('expert/leads/{lead}/status', [\App\Http\Controllers\Expert\LeadController::class, 'updateStatus'])->name('expert.leads.status');

    Route::resource('expert/slots', \App\Http\Controllers\Expert\SlotController::class)->names('expert.slots');
    Route::get('expert/bookings', [\App\Http\Controllers\Expert\BookingController::class, 'index'])->name('expert.bookings.index');
    Route::get('expert/bookings/{booking}/edit', [\App\Http\Controllers\Expert\BookingController::class, 'edit'])->name('expert.bookings.edit');
    Route::patch('expert/bookings/{booking}', [\App\Http\Controllers\Expert\BookingController::class, 'update'])->name('expert.bookings.update');

    // Payouts
    Route::get('expert/payouts', [\App\Http\Controllers\Expert\PayoutController::class, 'index'])->name('expert.payouts.index');
    Route::post('expert/payouts/request', [\App\Http\Controllers\Expert\PayoutController::class, 'requestPayout'])->name('expert.payouts.request');
});

// Community Actions (Auth Required)
Route::middleware('auth')->group(function () {
    Route::post('/community/question', [CommunityController::class, 'store'])->name('community.questions.store');
    Route::post('/community/interact/like', [InteractionController::class, 'toggleLike'])->name('community.like');
    Route::post('/community/interact/reply', [InteractionController::class, 'storeReply'])->name('community.reply');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/update-name', [ProfileController::class, 'updateName'])->name('profile.updateName');

    // Booking Action
    Route::post('/book-appointment', [BookingController::class, 'store'])->name('appointments.book');
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('appointments.mine');
});

// Master Search API
Route::get('/api/master-search', [\App\Http\Controllers\SearchController::class, 'masterSearch'])->name('api.master.search');

// Fetch Slots (Publicly accessible but booking requires login)
Route::get('/api/slots/{type}/{id}', function ($type, $id) {
    if ($type === 'expert') {
        $expert = \App\Models\MentorProfile::with(['availabilityDetail', 'pricingDetail'])->findOrFail($id);
        $availability = $expert->availabilityDetail;
        
        if (!$availability || empty($availability->slots)) {
            return response()->json([]);
        }

        $slots = [];
        $unavailabilityDates = json_decode($availability->unavailability_dates ?? '[]', true) ?: [];
        $cost = $expert->pricingDetail ? $expert->pricingDetail->fee_30_min : 0;
        
        $currentDate = now();
        $endDate = now()->addDays(14); // Next 14 days
        $slotIdCounter = 1;

        while ($currentDate <= $endDate) {
            $dayName = $currentDate->format('l');
            $dateString = $currentDate->toDateString();

            if (in_array($dateString, $unavailabilityDates)) {
                $currentDate->addDay();
                continue;
            }

            if (isset($availability->slots[$dayName])) {
                foreach ($availability->slots[$dayName] as $timeStr) {
                    $startTime = \Carbon\Carbon::parse($dateString . ' ' . $timeStr);
                    if ($startTime->isPast()) {
                        continue;
                    }
                    $endTime = $startTime->copy()->addMinutes(30);

                    $slots[] = [
                        'id' => 'mentor|' . $id . '|' . $dateString . '|' . $startTime->format('H:i:s') . '|' . $endTime->format('H:i:s'),
                        'expert_id' => $id,
                        'date' => $startTime->toIso8601String(),
                        'start_time' => $startTime->format('H:i:s'),
                        'end_time' => $endTime->format('H:i:s'),
                        'status' => 'available',
                        'cost' => $cost,
                        'mode' => 'video'
                    ];
                }
            }
            $currentDate->addDay();
        }
        
        usort($slots, function($a, $b) {
            return strtotime($a['date']) <=> strtotime($b['date']);
        });

        return response()->json($slots);
    } else {
        // Fallback for alumni or others if needed
        $provider = \App\Models\Alumni::findOrFail($id);
        return $provider->availability_slots()->where('status', 'open')->where('date', '>=', now()->toDateString())->get();
    }
})->name('api.slots');

Route::name('pages.')->group(function () {

    Route::get('/', [PageController::class, 'home'])
        ->name('home');

    Route::get('/blogs', [PageController::class, 'blog'])
        ->name('blogs');

    Route::get('/blogs/{slug}', [PageController::class, 'blogDetail'])
        ->name('blogs.detail');

    Route::get('/learning-opportunity/{slug}', [PageController::class, 'learningOpportunityDetail'])
        ->name('learning-opportunity.detail');

    Route::get('/degrees', [PageController::class, 'degrees'])
        ->name('degrees');

    Route::get('/compare', [PageController::class, 'compare'])
        ->name('compare');

    Route::get('/students-community', [CommunityController::class, 'index'])->name('students.community');

    Route::get('/my-learning', [PageController::class, 'myLearning'])
        ->name('mylearning');

    // Expert Profiles
    Route::get('/experts', [PageController::class, 'experts'])->name('experts');
    Route::get('/experts/{id}', [PageController::class, 'expertDetail'])->name('experts.detail');

    // Alumni Profiles
    Route::get('/alumni', [PageController::class, 'alumni'])->name('alumni');
    Route::get('/alumni/{id}', [PageController::class, 'alumnusDetail'])->name('alumni.detail');

    // Dynamic Organisation Types
    $orgTypes = ['universities', 'colleges', 'institutes', 'schools', 'exam-bodies', 'counselling-bodies', 'regulatory-bodies', 'government-agencies'];
    foreach ($orgTypes as $type) {
        Route::get('/' . $type, [OrganisationController::class, 'index'])->defaults('type_slug', $type)->name('organisations.' . $type);
    }
    Route::get('/{type_slug}/{slug}', [OrganisationController::class, 'show'])
        ->whereIn('type_slug', $orgTypes)
        ->name('organisations.detail.dynamic');

    // Keep legacy for compatibility or replace entirely (commented out the old ones just in case)
    Route::get('/organisations', [PageController::class, 'organisations'])->name('organisations');
    Route::get('/organisations/{slug}', [PageController::class, 'organisationDetail'])->name('organisations.detail');

    Route::get('/about-us', [PageController::class, 'aboutUs'])->name('aboutUs');
    Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contactUs');
    Route::get('/faq', [PageController::class, 'faq'])->name('faq');
    Route::get('/scholarships', [PageController::class, 'scholarshipsIndex'])->name('scholarships.index');
    Route::get('/exams', [PageController::class, 'examsIndex'])->name('exams.index');
    Route::get('/exams/{slug}', [PageController::class, 'examDetail'])->name('exams.detail');
    
    // Dynamic Pages (Privacy Policy, Terms, etc.)
    Route::get('/page/{slug}', [PageController::class, 'dynamicPage'])->name('dynamic');
});







