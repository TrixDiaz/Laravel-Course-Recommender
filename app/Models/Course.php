<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'course_level_skills', 'course_level_id', 'skill_id')
            ->whereHas('courseLevels', function ($query) {
                $query->where('course_id', $this->id);
            })
            ->where('skills.is_active', true)
            ->withTimestamps();
    }

    public function courseLevelSkill()
    {
        return $this->hasMany(CourseLevelSkill::class);
    }

    public function levels(): HasMany
    {
        return $this->hasMany(CourseLevel::class);
    }

    public function courseLevels()
    {
        return $this->hasMany(CourseLevel::class);
    }
}
