<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fee_payment_details', function (Blueprint $table) {

            $table->id();

            $table->bigInteger('fee_payment_id');

            $table->bigInteger('fee_category_id');

            $table->decimal('amount', 10, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fee_payment_details');
    }
};