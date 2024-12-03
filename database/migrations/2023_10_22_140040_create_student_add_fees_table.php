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
        Schema::create('student_add_fees', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable();
            $table->string('class_id')->nullable();
            $table->string('total_amount')->default('0');
            $table->string('paid_amount')->default('0');
            $table->string('remaining_amount')->default('0');
            $table->string('payment_type')->nullable();
            $table->string('remarks')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_add_fees');
    }
};
