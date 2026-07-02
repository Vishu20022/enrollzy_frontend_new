<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorEducation extends Model
{
    use HasFactory;

    protected $table = 'mentor_educations';

    protected $fillable = [
        'mentor_profile_id',
        'degree_type',
        'specialisation',
        'institution',
        'year_of_graduation',
        'degree_certificate',
        'is_verified'
    ];

    public function mentorProfile()
    {
        return $this->belongsTo(MentorProfile::class);
    }
}
