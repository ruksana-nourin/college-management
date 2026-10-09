<?php

namespace Database\Seeders;

use App\Models\AcademicSession;
use App\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    public function run(): void
    {
        $sessions = AcademicSession::all();

        foreach ($sessions as $session) {

            $startYear = $session->start_date->year;

            $semesters = [
                [
                    'name' => '1st Semester',
                    'start_date' => $startYear . '-01-01',
                    'end_date' => $startYear . '-06-30',
                    'description' => 'First semester of ' . $session->name,
                ],

                [
                    'name' => '2nd Semester',
                    'start_date' => $startYear . '-07-01',
                    'end_date' => $startYear . '-12-31',
                    'description' => 'Second semester of ' . $session->name,
                ],
            ];

            foreach ($semesters as $semester) {

                Semester::create([
                    'academic_session_id' => $session->id,
                    'name' => $semester['name'],
                    'start_date' => $semester['start_date'],
                    'end_date' => $semester['end_date'],
                    'description' => $semester['description'],
                ]);
            }
        }
    }
}