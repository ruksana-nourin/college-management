<?php

namespace Database\Seeders;

use App\Models\AcademicClass;
use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $academicClasses = AcademicClass::all();

        foreach ($academicClasses as $academicClass) {

            foreach (['A', 'B', 'C'] as $section) {

                Section::create([
                    'academic_class_id' => $academicClass->id,
                    'name' => 'Section ' . $section,
                    'code' => 'SEC-' . $academicClass->id . '-' . $section,
                    'description' => 'Section ' . $section . ' of ' . $academicClass->name,
                ]);
            }
        }
    }
}