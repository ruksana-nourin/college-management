<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'exam_id',
    'student_id',
    'total_marks',
    'total_obtained',
    'grade',
    'grade_point',
])]
class ExamResult extends Model
{
    use HasFactory;
}