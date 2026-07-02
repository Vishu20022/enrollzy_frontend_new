<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorAvailabilityDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'mentor_profile_id', 'timezone', 'slots', 
        'advance_notice', 'max_sessions', 'pause_bookings',
        'unavailability_dates'
    ];

    protected $casts = [
        'slots' => 'array',
        'pause_bookings' => 'boolean',
    ];

    public function profile()
    {
        return $this->belongsTo(MentorProfile::class, 'mentor_profile_id');
    }
}
