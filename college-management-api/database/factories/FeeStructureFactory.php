<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Semester;
use App\Models\FeeCategory;

class FeeStructureFactory extends Factory
{
    public function definition(): array
    {
        return [
            'semester_id' => Semester::inRandomOrder()->value('id'),

            'fee_category_id' => FeeCategory::inRandomOrder()->value('id'),

            'amount' => fake()->randomFloat(2, 500, 10000),
        ];
    }
}