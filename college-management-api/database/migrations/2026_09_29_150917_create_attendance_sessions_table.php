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
        Schema::create('attendance_sessions', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('subject_id');

            $table->unsignedBigInteger('teacher_id');

            $table->unsignedBigInteger('class_id');

            $table->unsignedBigInteger('section_id');

            $table->unsignedBigInteger('academic_session_id');

            $table->unsignedBigInteger('semester_id');

            $table->date('attendance_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_sessions');
    }
};
