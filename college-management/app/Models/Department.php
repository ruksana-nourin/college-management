<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'code'])]
class Department extends Model
{
    use HasFactory;
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
