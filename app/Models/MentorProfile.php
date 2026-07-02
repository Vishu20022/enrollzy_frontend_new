<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'profile_photo',
        'professional_headline',
        'short_bio',
        'city',
        'state_country'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function languages()
    {
        return $this->belongsToMany(MentorLanguage::class, 'mentor_profile_languages');
    }

    public function educations()
    {
        return $this->hasMany(MentorEducation::class);
    }

    public function experiences()
    {
        return $this->hasMany(MentorExperience::class);
    }

    public function mentorshipDetail()
    {
        return $this->hasOne(MentorMentorshipDetail::class);
    }

    public function availabilityDetail()
    {
        return $this->hasOne(MentorAvailabilityDetail::class);
    }

    public function pricingDetail()
    {
        return $this->hasOne(MentorPricingDetail::class);
    }

    public function verification()
    {
        return $this->hasOne(MentorVerification::class);
    }

    public function preference()
    {
        return $this->hasOne(MentorPreference::class);
    }
}
