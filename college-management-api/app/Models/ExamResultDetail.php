<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'exam_result_id',
    'subject_id',
    'full_marks',
    'obtained_marks',
    'grade',
    'grade_point',
])]
class ExamResultDetail extends Model
{
    use HasFactory;
}