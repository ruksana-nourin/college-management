<?php

namespace Database\Seeders;

use App\Models\StudentStatus;
use Illuminate\Database\Seeder;

class StudentStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            'Active',
            'Inactive',
            'Graduated',
            'Suspended',
            'Withdrawn',
        ];

        foreach ($statuses as $status) {
            StudentStatus::create([
                'name' => $status,
            ]);
        }
    }
}
