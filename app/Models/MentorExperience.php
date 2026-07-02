<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'mentor_profile_id', 'job_title', 'company', 'industry', 
        'years_of_experience', 'start_year', 'end_year', 
        'is_current', 'linkedin_url', 'achievements'
    ];

    public function profile()
    {
        return $this->belongsTo(MentorProfile::class, 'mentor_profile_id');
    }
}
