<?php

namespace Database\Factories;

use App\Models\AcademicSession;
use Illuminate\Database\Eloquent\Factories\Factory;

class SemesterFactory extends Factory
{
    public function definition(): array
    {
        return [
            'academic_session_id' => AcademicSession::inRandomOrder()->first()->id,

            'name' => fake()->randomElement([
                '1st Semester',
                '2nd Semester',
                '3rd Semester',
                '4th Semester',
                '5th Semester',
                '6th Semester',
            ]),

            'start_date' => fake()->dateTimeBetween('-1 year', 'now')
                ->format('Y-m-d'),

            'end_date' => fake()->dateTimeBetween('now', '+1 year')
                ->format('Y-m-d'),

            'description' => fake()->sentence(10),
        ];
    }
}