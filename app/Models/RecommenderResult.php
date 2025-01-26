<?php

namespace App\Models;

use Filament\Actions\Concerns\HasAction;
use Illuminate\Database\Eloquent\Model;

class RecommenderResult extends Model
{
    use HasAction;

    protected $guarded = [];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'recommender_result_courses', 'recommender_result_id', 'course_id');
    }
}
