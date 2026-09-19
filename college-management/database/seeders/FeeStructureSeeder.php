<?php

namespace Database\Seeders;

use App\Models\FeeStructure;
use App\Models\Semester;
use App\Models\FeeCategory;
use Illuminate\Database\Seeder;

class FeeStructureSeeder extends Seeder
{
    public function run(): void
    {
        $semesters = Semester::all();

        foreach ($semesters as $semester) {

            $tuitionFee = FeeCategory::where(
                'name',
                'Tuition Fee'
            )->first();

            $examinationFee = FeeCategory::where(
                'name',
                'Examination Fee'
            )->first();

            $libraryFee = FeeCategory::where(
                'name',
                'Library Fee'
            )->first();

            $laboratoryFee = FeeCategory::where(
                'name',
                'Laboratory Fee'
            )->first();

            FeeStructure::create([
                'semester_id' => $semester->id,
                'fee_category_id' => $tuitionFee->id,
                'amount' => 5000,
            ]);

            FeeStructure::create([
                'semester_id' => $semester->id,
                'fee_category_id' => $examinationFee->id,
                'amount' => 1000,
            ]);

            FeeStructure::create([
                'semester_id' => $semester->id,
                'fee_category_id' => $libraryFee->id,
                'amount' => 500,
            ]);

            FeeStructure::create([
                'semester_id' => $semester->id,
                'fee_category_id' => $laboratoryFee->id,
                'amount' => 1500,
            ]);
        }
    }
}