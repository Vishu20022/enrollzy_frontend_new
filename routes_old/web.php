<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\CommunityController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfessionalAuthController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteProtectionController;

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

    // Booking Action
    Route::post('/book-appointment', [BookingController::class, 'store'])->name('appointments.book');
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('appointments.mine');
});

// Fetch Slots (Publicly accessible but booking requires login)
Route::get('/api/slots/{type}/{id}', function ($type, $id) {
    if ($type === 'expert') {
        $expert = \App\Models\Expert::findOrFail($id);
        return $expert->slots()
            ->where('status', 'available')
            ->where('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();
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

    Route::get('/degrees', [PageController::class, 'degrees'])
        ->name('degrees');

    Route::get('/students-community', [CommunityController::class, 'index'])->name('students.community');


    Route::get('/my-learning', [PageController::class, 'myLearning'])
        ->name('mylearning');

    // Expert Profiles
    Route::get('/experts', [PageController::class, 'experts'])->name('experts');
    Route::get('/experts/{id}', [PageController::class, 'expertDetail'])->name('experts.detail');

    // Alumni Profiles
    Route::get('/alumni', [PageController::class, 'alumni'])->name('alumni');
    Route::get('/alumni/{id}', [PageController::class, 'alumnusDetail'])->name('alumni.detail');

    // Organisation Profiles
    Route::get('/organisations/{slug}', [PageController::class, 'organisationDetail'])->name('organisations.detail');

});





