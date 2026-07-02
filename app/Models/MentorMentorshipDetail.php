<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorMentorshipDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'mentor_profile_id', 'areas_of_mentorship', 'target_mentee_levels',
        'session_formats', 'session_durations', 'preferred_platform', 'mentoring_style'
    ];

    protected $casts = [
        'areas_of_mentorship' => 'array',
        'target_mentee_levels' => 'array',
        'session_formats' => 'array',
        'session_durations' => 'array',
    ];

    public function profile()
    {
        return $this->belongsTo(MentorProfile::class, 'mentor_profile_id');
    }
}
