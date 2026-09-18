<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['course_id','name','code','description'])]

class AcademicClass extends Model
{
    use HasFactory;

    

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function sections()
{
    return $this->hasMany(Section::class);
}
}