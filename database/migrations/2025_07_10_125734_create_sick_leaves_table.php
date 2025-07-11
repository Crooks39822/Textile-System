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
        Schema::create('sick_leave', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('user_id'); // Employee
        $table->date('start_date');
        $table->date('end_date');
        $table->string('reason')->nullable();
        $table->string('doctor_note_path')->nullable(); // Upload sick sheet
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sick_leaves');
    }
};
