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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->bigInteger('academic_session_id');
            $table->bigInteger('semester_id');
            $table->bigInteger('academic_class_id');
            $table->bigInteger('section_id');
            $table->bigInteger('group_id')->nullable();

            $table->date('exam_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
