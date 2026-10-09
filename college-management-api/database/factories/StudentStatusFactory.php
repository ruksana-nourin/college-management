<?php

namespace Database\Factories;

use App\Models\StudentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudentStatus>
 */
class StudentStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Active',
                'Inactive',
                'Graduated',
                'Suspended',
                'Withdrawn',
            ]),
        ];
    }
}
