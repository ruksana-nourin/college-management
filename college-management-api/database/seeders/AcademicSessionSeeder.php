<?php

namespace Database\Seeders;

use App\Models\AcademicSession;
use Illuminate\Database\Seeder;

class AcademicSessionSeeder extends Seeder
{
    public function run(): void
    {
        $sessions = [
            [
                'name' => '2024-2025',
                'code' => '2024-25',
                'start_date' => '2024-01-01',
                'end_date' => '2025-12-31',
                'description' => 'Academic session 2024-2025',
            ],

            [
                'name' => '2025-2026',
                'code' => '2025-26',
                'start_date' => '2025-01-01',
                'end_date' => '2026-12-31',
                'description' => 'Academic session 2025-2026',
            ],

            [
                'name' => '2026-2027',
                'code' => '2026-27',
                'start_date' => '2026-01-01',
                'end_date' => '2027-12-31',
                'description' => 'Academic session 2026-2027',
            ],

            [
                'name' => '2027-2028',
                'code' => '2027-28',
                'start_date' => '2027-01-01',
                'end_date' => '2028-12-31',
                'description' => 'Academic session 2027-2028',
            ],
        ];

        foreach ($sessions as $session) {
            AcademicSession::create($session);
        }
    }
}
