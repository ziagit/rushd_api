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
            $table->text('description')->nullable();
            $table->dateTime('date')->nullable();
            $table->unsignedBigInteger('type_id');
            $table->timestamps();
            $table->unsignedBigInteger('school_id');
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
        
            $table->foreign('type_id')->references('id')->on('exam_types');
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