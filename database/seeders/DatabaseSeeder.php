<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseLevel;
use App\Models\Feedback;
use App\Models\Skill;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Course::factory(10)->create();
        Skill::factory(10)->create();
        Feedback::factory(10)->create();
        CourseLevel::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
