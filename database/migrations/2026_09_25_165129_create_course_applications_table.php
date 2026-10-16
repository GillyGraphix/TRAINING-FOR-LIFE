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
        Schema::create('course_applications', function (Blueprint $table) {
            $table->id();

            // 1. Taarifa Binafsi za Mwanafunzi
            $table->string('student_name');
            $table->string('current_address');
            $table->string('phone_number');
            $table->string('email')->nullable(); 
            $table->date('dob');
            $table->string('place_of_residence');
            $table->string('religion')->nullable();

            // 2. Taarifa za Mzazi au Mlezi
            $table->string('parent_name');
            $table->string('parent_occupation')->nullable();
            $table->string('parent_address')->nullable();
            $table->string('parent_phone');
            $table->string('parent_email')->nullable();

            // 3. Taarifa za Kitaaluma
            $table->string('mock_results'); 
            $table->string('school');
            $table->string('form_4_year'); 

            // 4. Maelezo Binafsi (TFL Course)
            $table->text('life_skills_essay'); 

            // 5. Mfumo wa Udhibiti (Admin Control)
            $table->enum('status', ['pending', 'shortlisted', 'accepted', 'rejected'])->default('pending');

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_applications');
    }
};