<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['name', 'code', 'duration', 'department_id', 'description'])]

class Course extends Model
{
    protected $table = 'courses';
    use HasFactory;
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
