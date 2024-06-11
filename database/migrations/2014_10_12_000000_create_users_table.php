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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('serial_number')->unique()->nullable();
            $table->string('name');
            $table->unsignedBigInteger('lower_court')->nullable();
            $table->foreign('lower_court')->references('id')->on('lower_courts')->onDelete('cascade');
            $table->unsignedBigInteger('high_court')->nullable();
            $table->foreign('high_court')->references('id')->on('high_courts')->onDelete('cascade');
            $table->string('phone')->nullable();
            $table->string('referred_by')->nullable();
            $table->string('relation')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('gpa')->nullable();
            $table->string('gpa_llm')->nullable();
            $table->string('court_practice')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('emergency_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->enum('email_verified', ['yes', 'no'])->default('no');
            $table->timestamp('email_verified_at')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('qualification')->nullable();
            $table->string('qualified_year')->nullable();
            $table->string('qualified_year_llm')->nullable();
            // $table->string('nid_number')->nullable();
            $table->string('university')->nullable();
            $table->string('university_llm')->nullable();
            $table->string('password')->nullable();
            $table->string('admission_date')->nullable();
            $table->string('confirm_password')->nullable();
            $table->enum('status', ['pending', 'approved', 'declined'])->default('pending');
            $table->enum('user_status', ['userEnable', 'userDisable'])->default('userEnable');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('events')->onDelete('cascade');
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
