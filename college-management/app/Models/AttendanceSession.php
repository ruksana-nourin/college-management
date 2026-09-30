<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceSession extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'teacher_id',
        'class_id',
        'section_id',
        'academic_session_id',
        'semester_id',
        'attendance_date',
    ];

    protected $casts = [
        'attendance_date' => 'date',
    ];

    public function subject()
{
    return $this->belongsTo(Subject::class, 'subject_id');
}

public function teacher()
{
    return $this->belongsTo(Teacher::class, 'teacher_id');
}

public function academicClass()
{
    return $this->belongsTo(AcademicClass::class, 'class_id');
}

public function section()
{
    return $this->belongsTo(Section::class, 'section_id');
}

public function academicSession()
{
    return $this->belongsTo(AcademicSession::class, 'academic_session_id');
}

public function semester()
{
    return $this->belongsTo(Semester::class, 'semester_id');
}

    public function attendanceRecords()
    {
        return $this->hasMany(AttendanceRecord::class);
    }
}