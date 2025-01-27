<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    protected $fillable = ['ip_address', 'user_agent'];

    public static function logVisit()
    {
        return self::create([
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent()
        ]);
    }

    // Helper method to get total visits
    public static function getTotalVisits()
    {
        return self::count();
    }
}
