<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorPricingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'mentor_profile_id', 'fee_30_min', 'fee_60_min',
        'offer_free_first_session', 'pro_bono_sessions', 'payout_method', 'upi_id'
    ];

    protected $casts = [
        'offer_free_first_session' => 'boolean',
    ];

    public function profile()
    {
        return $this->belongsTo(MentorProfile::class, 'mentor_profile_id');
    }
}
