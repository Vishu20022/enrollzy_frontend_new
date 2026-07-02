<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorPricingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'mentor_profile_id', 'fee_30_min', 'fee_60_min',
        'offer_free_first_session', 'pro_bono_sessions', 'payout_method', 'upi_id',
        'upi_qr_code', 'bank_account_holder_name', 'bank_account_number', 'bank_name', 'bank_ifsc_code'
    ];

    protected $casts = [
        'offer_free_first_session' => 'boolean',
    ];

    public function profile()
    {
        return $this->belongsTo(MentorProfile::class, 'mentor_profile_id');
    }
}
