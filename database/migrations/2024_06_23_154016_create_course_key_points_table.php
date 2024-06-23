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
        Schema::create('course_key_points', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('course_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('course_id')->references('student_id')->on('course_students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_key_points');
    }
};
