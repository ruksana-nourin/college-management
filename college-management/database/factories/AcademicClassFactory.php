<?php

namespace Database\Factories;

use App\Models\AcademicClass;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AcademicClass>
 */
class AcademicClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'course_id' => Course::inRandomOrder()->first()->id,

        'name' => fake()->randomElement([
            '1st Year',
            '2nd Year',
            '3rd Year',
            '4th Year',
        ]),

        'code' => fake()->unique()->bothify('CLS-###'),

        'description' => fake()->sentence(10),
        ];
    }
}
