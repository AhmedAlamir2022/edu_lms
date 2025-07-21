<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseChapter extends Model
{
    protected $guarded = [];

    function lessons(): HasMany
    {
        return $this->hasMany(CourseChapterLession::class, 'chapter_id', 'id')->orderBy('order');
    }
}