<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FeeStructure;

#[Fillable([
    'academic_session_id',
    'name',
    'start_date',
    'end_date',
    'description',
])]
class Semester extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function academicSession()
    {
        return $this->belongsTo(AcademicSession::class);
    }
    public function feeStructures()
    {
        return $this->hasMany(FeeStructure::class);
    }
    public function feePayments()
    {
        return $this->hasMany(FeePayment::class);
    }
}
