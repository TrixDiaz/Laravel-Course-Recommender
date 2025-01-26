<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'is_active' => 'boolean',
    ];

    public function levels(): HasMany
    {
        return $this->hasMany(CourseLevel::class);
    }
}
