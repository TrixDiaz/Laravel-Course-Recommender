<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseLevel extends Model
{
    /** @use HasFactory<\Database\Factories\CourseLevelFactory> */
    use HasFactory;

    protected $guarded = [];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'course_level_skills');
    }
    public function courseLevels(): HasMany
    {
        return $this->hasMany(CourseLevel::class);
    }

    public function courseLevelSkill(): HasMany
    {
        return $this->hasMany(CourseLevelSkill::class);
    }
}
