<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'name',
        'academic_session_id',
        'semester_id',
        'academic_class_id',
        'section_id',
        'group_id',
        'exam_date',
    ];

    public function academicSession()
    {
        return $this->belongsTo(AcademicSession::class);
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }
}
