<?php

namespace Database\Factories;

use App\Models\FeePayment;
use App\Models\FeeCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeePaymentDetailFactory extends Factory
{
    public function definition(): array
    {
        return [
            'fee_payment_id' => FeePayment::inRandomOrder()->value('id'),

            'fee_category_id' => FeeCategory::inRandomOrder()->value('id'),

            'amount' => fake()->randomFloat(2, 500, 5000),
        ];
    }
}