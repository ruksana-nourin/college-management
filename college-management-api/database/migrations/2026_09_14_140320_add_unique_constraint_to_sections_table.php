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
        Schema::table('sections', function (Blueprint $table) {
            $table->unique(
                ['academic_class_id', 'name'],
                'sections_academic_class_name_unique'
            );
        });
    }


    /**
     * Reverse the migrations.
     */
   
    public function down(): void
    {
        Schema::table('sections', function (Blueprint $table) {
            $table->dropUnique('sections_academic_class_name_unique');
        });
    }
};
