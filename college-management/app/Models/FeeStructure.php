<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Models\Semester;
use App\Models\FeeCategory;

#[Fillable([
    'semester_id',
    'fee_category_id',
    'amount',
])]
class FeeStructure extends Model
{
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function feeCategory()
    {
        return $this->belongsTo(FeeCategory::class);
    }
}