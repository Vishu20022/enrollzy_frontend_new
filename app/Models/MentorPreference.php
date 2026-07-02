<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorPreference extends Model
{
    use HasFactory;

    protected $fillable = [
        'mentor_profile_id', 'new_booking_request', 'session_reminders',
        'new_review_posted', 'weekly_analytics_digest', 'platform_announcements',
        'whatsapp_notifications', 'notification_email', 'whatsapp_number'
    ];

    protected $casts = [
        'new_booking_request' => 'boolean',
        'session_reminders' => 'boolean',
        'new_review_posted' => 'boolean',
        'weekly_analytics_digest' => 'boolean',
        'platform_announcements' => 'boolean',
        'whatsapp_notifications' => 'boolean',
    ];

    public function profile()
    {
        return $this->belongsTo(MentorProfile::class, 'mentor_profile_id');
    }
}
