<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'student_id',
    'name',
    'image',
    'email',
    'phone',
    'gender',
    'date_of_birth',
    'blood_group',
    'address',
    'department_id',
    'course_id',
    'academic_class_id',
    'section_id',
    'group_id',
    'academic_session_id',
    'admission_date',
    'gurdian_name',
    'gurdian_phone',
    'student_status_id',
])]
class Student extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'admission_date' => 'date',
        ];
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function academicSession()
    {
        return $this->belongsTo(AcademicSession::class);
    }

    public function studentStatus()
    {
        return $this->belongsTo(StudentStatus::class);
    }
}
