<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_code',
        'name',
        'email',
        'phone',
        'department_id',
        'img',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}