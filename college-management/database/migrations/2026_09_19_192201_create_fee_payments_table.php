<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fee_payments', function (Blueprint $table) {

            $table->id();

            $table->string('receipt_no')->unique();

            $table->bigInteger('student_id');

            $table->bigInteger('academic_session_id');

            $table->bigInteger('semester_id');

            $table->date('payment_date');

            $table->decimal('total_amount', 10, 2);

            $table->decimal('payment_amount', 10, 2);

            $table->decimal('due_amount', 10, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fee_payments');
    }
};