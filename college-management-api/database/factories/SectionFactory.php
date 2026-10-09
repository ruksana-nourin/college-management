<?php

namespace Database\Factories;

use App\Models\AcademicClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'academic_class_id' => AcademicClass::inRandomOrder()->first()->id,

            'name' => fake()->randomElement([
                'Section A',
                'Section B',
                'Section C',
            ]),

            'code' => fake()->unique()->bothify('SEC-###'),

            'description' => fake()->sentence(10),
        ];
    }
}