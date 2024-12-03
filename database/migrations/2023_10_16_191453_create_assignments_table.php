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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('class_id')->nullable();
            $table->string('subject_id')->nullable();
            $table->string('assignment_date')->nullable();
            $table->string('submission_date')->nullable();
            $table->string('document_file')->nullable();
            $table->string('description')->nullable();
            $table->string('is_delete')->default('0');
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
