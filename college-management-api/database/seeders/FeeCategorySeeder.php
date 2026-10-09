<?php

namespace Database\Seeders;

use App\Models\FeeCategory;
use Illuminate\Database\Seeder;

class FeeCategorySeeder extends Seeder
{
    public function run(): void
{
    FeeCategory::create([
        'name' => 'Admission Fee',
    ]);

    FeeCategory::create([
        'name' => 'Tuition Fee',
    ]);

    FeeCategory::create([
        'name' => 'Examination Fee',
    ]);

    FeeCategory::create([
        'name' => 'Library Fee',
    ]);

    FeeCategory::create([
        'name' => 'Laboratory Fee',
    ]);

    FeeCategory::create([
        'name' => 'Development Fee',
    ]);

    FeeCategory::create([
        'name' => 'Transport Fee',
    ]);

    FeeCategory::create([
        'name' => 'Other Fee',
    ]);
}
}
