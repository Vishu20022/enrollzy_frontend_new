<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    public function mentorProfiles()
    {
        return $this->belongsToMany(MentorProfile::class, 'mentor_profile_languages');
    }
}
