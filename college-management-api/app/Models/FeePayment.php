<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable([
    'receipt_no',
    'student_id',
    'academic_session_id',
    'semester_id',
    'payment_date',
    'total_amount',
    'payment_amount',
    'due_amount',
])]
class FeePayment extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function academicSession()
    {
        return $this->belongsTo(AcademicSession::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function details()
    {
        return $this->hasMany(FeePaymentDetail::class);
    }
}