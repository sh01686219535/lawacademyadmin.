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
        Schema::create('real_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('cost')->nullable();
            $table->string('video')->nullable();
            $table->text('image')->nullable();
            $table->text('memoriesImage')->nullable();
            $table->text('venue')->nullable();
            $table->string('type')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_events');
    }
};
