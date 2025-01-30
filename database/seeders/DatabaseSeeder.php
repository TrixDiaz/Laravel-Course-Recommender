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
        $courses = Course::factory(5)->create([
            'is_active' => true,
            'required_average' => 80
        ]);

        // Create skills
        $skills = Skill::factory(5)->create([
            'is_active' => true
        ]);

        // Create course level skills relationships
        foreach ($courses as $course) {
            foreach ($skills as $skill) {
                \App\Models\CourseLevelSkill::create([
                    'skill_id' => $skill->id,
                    'course_level_id' => CourseLevel::factory()->create([
                        'course_id' => $course->id
                    ])->id
                ]);
            }
        }
        Feedback::factory(10)->create();
        CourseLevel::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
