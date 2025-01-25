<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(20),
            'course_code' => fake()->text(5),
            'course_description' => fake()->text(50),
            'required_average' => fake()->randomFloat(2, 0, 100),
            'is_active' => fake()->boolean(),

        ];
    }
}
