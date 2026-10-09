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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            // student identity
            $table->string('student_id')->unique();
            $table->string('name');
            $table->string('image')->nullable();

            // Personal information
            $table->string('email')->unique()->nullable();
            $table->string('phone');
            $table->string('gender');
            $table->date('date_of_birth')->nullable();
            $table->string('blood_group')->nullable();
            $table->text('address')->nullable();

            // Academic information
            $table->bigInteger('department_id');
            $table->bigInteger('course_id');
            $table->bigInteger('academic_class_id');
            $table->bigInteger('section_id');
            $table->bigInteger('group_id')->nullable();
            $table->bigInteger('academic_session_id');

            // Admission information
            $table->date('admission_date');
            $table->string('guardian_name');
            $table->string('guardian_phone');

            // Status
            $table->bigInteger('student_status_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
