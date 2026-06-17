<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolMarquee extends Model
{
    use HasFactory;

    protected $table = 'school_marquees';

    protected $fillable = ['logo', 'name', 'heading', 'subheading', 'sort_order', 'status', 'direction'];
    
    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];
}
