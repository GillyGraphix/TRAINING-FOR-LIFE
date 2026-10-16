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
        Schema::create('snm_scholarships', function (Blueprint $table) {
            $table->id();

            // Section 1: Personal Information
            $table->string('full_name');
            $table->date('dob');
            $table->string('gender'); // Male/Female
            $table->string('national_id')->nullable();
            $table->string('phone_number');
            $table->string('home_address');

            // Section 2: Education Status
            $table->string('current_school');
            $table->string('current_class');
            $table->string('education_status'); 
            $table->text('reason_for_leaving')->nullable();
            $table->string('form_four_results')->nullable(); // Mfano: Div I, Div II, n.k
            $table->boolean('was_school_leader')->default(false);
            $table->string('leadership_role')->nullable();

            // Section 3: Vulnerability Criteria (Confidential)
            $table->string('orphan_status'); // No, One parent deceased, Both parents deceased
            $table->boolean('single_parent')->default(false);
            $table->boolean('has_disability')->default(false);
            $table->string('disability_type')->nullable();
            $table->boolean('has_dependents')->default(false);
            $table->text('household_situation')->nullable();

            // Section 4: Motivation
            $table->text('need_reason');
            $table->text('career_goals');
            $table->json('support_needed')->nullable(); // Mfano: Sare, Vitabu, Usafiri (itakuwa Array)

            // Section 5: Documents (File Paths)
            $table->string('report_card_path');
            $table->string('recommendation_letter_path');
            $table->string('parent_id_path')->nullable();
            $table->string('passport_photo_path');

            // Section 6: Declaration
            $table->boolean('declaration_accepted')->default(false);
            $table->boolean('parent_consent_accepted')->default(false);

            // Admin & Priority Fields (Kwa ajili ya TFL Staff pekee)
            $table->integer('priority_score')->default(0); // Maksi za kuwapanga
            $table->string('verification_status')->default('Unverified'); // Unverified, Verified via school, Verified via local leader

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('snm_scholarships');
    }
};