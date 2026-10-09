<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable([
    'fee_payment_id',
    'fee_category_id',
    'amount',
])]
class FeePaymentDetail extends Model
{
    use HasFactory;
    public function feePayment()
    {
        return $this->belongsTo(FeePayment::class);
    }

    public function feeCategory()
    {
        return $this->belongsTo(FeeCategory::class);
    }
}