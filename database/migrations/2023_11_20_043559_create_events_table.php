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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->dateTime('start_date');
            $table->string('days');
            $table->string('cost');
            $table->text('image')->nullable();
            $table->unsignedBigInteger('lowerCourt_id')->nullable();
            $table->unsignedBigInteger('highCourt_id')->nullable();
            $table->foreign('lowerCourt_id')->references('id')->on('lower_courts')->onDelete('cascade');
            $table->foreign('highCourt_id')->references('id')->on('high_courts')->onDelete('cascade');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
