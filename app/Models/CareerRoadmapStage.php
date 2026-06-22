<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerRoadmapStage extends Model
{
    protected $table = 'career_roadmap_stages';

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'image',
        'description',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(CareerRoadmapCategory::class, 'category_id');
    }

    public function subModules()
    {
        return $this->hasMany(CareerRoadmapSubModule::class, 'stage_id')->orderBy('id');
    }
}
