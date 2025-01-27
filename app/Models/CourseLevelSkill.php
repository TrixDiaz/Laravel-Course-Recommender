<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLevelSkill extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function courseLevel()
    {
        return $this->belongsTo(CourseLevel::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class)->where('is_active', true);
    }

    public function course()
    {
        return $this->belongsTo(Course::class)->where('is_active', true);
    }
}
