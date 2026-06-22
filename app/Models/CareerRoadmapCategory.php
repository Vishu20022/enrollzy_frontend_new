<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerRoadmapCategory extends Model
{
    protected $table = 'career_roadmap_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
    ];

    public function stages()
    {
        return $this->hasMany(CareerRoadmapStage::class, 'category_id')->orderBy('id');
    }
}
