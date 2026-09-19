<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\AcademicSession;
use App\Models\Semester;
use App\Models\FeeCategory;
use App\Models\FeePayment;
use App\Models\FeePaymentDetail;
use Illuminate\Database\Seeder;

class FeePaymentSeeder extends Seeder
{
    public function run(): void
    {
        $student = Student::first();

        $semester = Semester::first();

        $academicSession = $semester->academicSession;

        $tuitionFee = FeeCategory::where(
            'name',
            'Tuition Fee'
        )->first();

        $libraryFee = FeeCategory::where(
            'name',
            'Library Fee'
        )->first();

        if (
            !$student ||
            !$semester ||
            !$academicSession ||
            !$tuitionFee ||
            !$libraryFee
        ) {
            return;
        }

        $feePayment = FeePayment::create([
            'receipt_no' => 'REC-2026-0001',

            'student_id' => $student->id,

            'academic_session_id' => $academicSession->id,

            'semester_id' => $semester->id,

            'payment_date' => now()->toDateString(),

            'total_amount' => 5500,

            'payment_amount' => 4500,

            'due_amount' => 1000,
        ]);

        FeePaymentDetail::create([
            'fee_payment_id' => $feePayment->id,

            'fee_category_id' => $tuitionFee->id,

            'amount' => 4000,
        ]);

        FeePaymentDetail::create([
            'fee_payment_id' => $feePayment->id,

            'fee_category_id' => $libraryFee->id,

            'amount' => 500,
        ]);
    }
}