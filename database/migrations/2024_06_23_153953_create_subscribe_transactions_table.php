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
        Schema::create('subscribe_transactions', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('course_student_id');
            $table->unsignedBigInteger('student_id');
            $table->string('amount');
            $table->enum('is_paid', ['Unpaid', 'Paid', 'Cancelled']);
            $table->string('amount');
            $table->date('subscription_start_date');
            $table->date('subscription_end_date');
            $table->timestamps();
            $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

            $table->foreign('course_student_id')->references('id')->on('course_students')->onDelete('cascade');
            $table->foreign('student_id')->references('student_id')->on('course_students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribe_transactions');
    }
};
