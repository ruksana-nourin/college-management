<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
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
        'department_id' => Department::inRandomOrder()->first()->id,
        'name' => fake()->unique()->sentence(3),
        'code' => fake()->unique()->bothify('CRS-###'),
        'duration' => fake()->numberBetween(2, 4),
        'description' => fake()->sentence(10),
    ];
}
}
