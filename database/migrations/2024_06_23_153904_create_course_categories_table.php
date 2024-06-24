<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseCategoriesTable extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('course_categories')) {
            Schema::create('course_categories', function (Blueprint $table) {
                $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
                $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('course_categories');
    }
};
