<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kijana_fursa_applications', function (Blueprint $table) {
            $table->id();
            
            // Sehemu ya 1: Taarifa Binafsi
            $table->string('full_name');
            $table->date('dob');
            $table->string('gender');
            $table->string('id_number')->nullable();
            $table->string('phone_number');
            $table->string('address');

            // Sehemu ya 2: Hali ya Elimu
            $table->string('education_level');
            $table->string('form4_results')->nullable();

            // Sehemu ya 3: Biashara au Wazo la Biashara
            $table->boolean('has_business')->default(false);
            $table->string('business_type')->nullable();
            $table->string('business_duration')->nullable();
            $table->string('monthly_income')->nullable();
            $table->text('business_idea')->nullable();
            
            $table->json('sectors'); 
            
            $table->boolean('previous_training')->default(false);
            $table->text('previous_training_details')->nullable();
            
            $table->boolean('has_startup_assets')->default(false);
            $table->text('startup_assets_details')->nullable();

            // Sehemu ya 4: Sababu za Kuomba
            $table->text('motivation_reason');
            $table->text('future_expectations');

            // Sehemu ya 5: Nyaraka Muhimu (Hifadhi paths za mafaili)
            $table->string('passport_photo_path');
            $table->string('id_document_path');
            $table->string('introduction_letter_path')->nullable();

            // Sehemu ya 6: Tamko
            $table->boolean('declaration_accepted')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kijana_fursa_applications');
    }
};