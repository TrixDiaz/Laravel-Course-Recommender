<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLevel extends Model
{
    /** @use HasFactory<\Database\Factories\CourseLevelFactory> */
    use HasFactory;

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
