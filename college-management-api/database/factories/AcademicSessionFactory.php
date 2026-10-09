<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AcademicSessionFactory extends Factory
{
    public function definition(): array
    {
        $startYear = fake()->numberBetween(2024, 2028);

        return [
            'name' => $startYear . '-' . ($startYear + 1),

            'code' => $startYear . '-' . substr($startYear + 1, -2),

            'start_date' => $startYear . '-01-01',

            'end_date' => ($startYear + 1) . '-12-31',

            'description' => 'Academic session ' . $startYear . '-' . ($startYear + 1),
        ];
    }
}