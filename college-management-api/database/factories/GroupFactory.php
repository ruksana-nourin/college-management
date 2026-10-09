<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Science',
                'Commerce',
                'Arts',
            ]),

            'code' => fake()->unique()->randomElement([
                'SCI',
                'COM',
                'ART',
            ]),

            'description' => fake()->sentence(10),
        ];
    }
}