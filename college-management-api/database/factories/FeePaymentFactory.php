<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\AcademicSession;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeePaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'receipt_no' => 'REC-' . fake()->unique()->numberBetween(10000, 99999),

            'student_id' => Student::inRandomOrder()->value('id'),

            'academic_session_id' => AcademicSession::inRandomOrder()->value('id'),

            'semester_id' => Semester::inRandomOrder()->value('id'),

            'payment_date' => fake()->date(),

            'total_amount' => fake()->randomFloat(2, 5000, 15000),

            'payment_amount' => fake()->randomFloat(2, 1000, 10000),

            'due_amount' => 0,
        ];
    }
}