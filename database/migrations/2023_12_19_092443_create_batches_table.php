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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('batch_name');
            $table->unsignedBigInteger('lowerCourt_id')->nullable();
            $table->unsignedBigInteger('highCourt_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->string('time')->nullable();
            $table->string('batch_day')->nullable();
            $table->foreign('lowerCourt_id')->references('id')->on('lower_courts')->onDelete('cascade');
            $table->foreign('highCourt_id')->references('id')->on('high_courts')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('events')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
