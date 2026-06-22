<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'status',
    ];

    public function parent()
    {
        return $this->belongsTo(FaqCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(FaqCategory::class, 'parent_id');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren', 'faqs');
    }

    public function faqs()
    {
        return $this->hasMany(FaqItem::class, 'faq_category_id');
    }
}
