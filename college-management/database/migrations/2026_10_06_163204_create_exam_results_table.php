<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('exam_results', function (Blueprint $table) {
        $table->id();

        $table->bigInteger('exam_id');
        $table->bigInteger('student_id');

        $table->decimal('total_marks', 8, 2);
        $table->decimal('total_obtained', 8, 2);

        $table->string('grade');
        $table->decimal('grade_point', 4, 2);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_results');
    }
};
