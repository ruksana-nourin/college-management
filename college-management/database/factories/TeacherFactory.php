<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    public function definition(): array
    {
        return [
            'teacher_code' => 'TCH-' . fake()->unique()->numberBetween(1000, 9999),

            'name' => fake()->name(),

            'email' => fake()->unique()->safeEmail(),

            'phone' => '01' . fake()->numerify('#########'),

            'department_id' => Department::inRandomOrder()->value('id'),

            'img' => null,
        ];
    }
}