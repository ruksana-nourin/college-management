<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name'])]

class FeeCategory extends Model
{
    /** @use HasFactory<\Database\Factories\FeeCategoryFactory> */
    use HasFactory;

    public function feeStructures()
    {
        return $this->hasMany(FeeStructure::class);
    }
    public function feePaymentDetails()
    {
        return $this->hasMany(FeePaymentDetail::class);
    }
}
