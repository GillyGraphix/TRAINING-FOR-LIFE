<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KijanaFursaApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 
        'dob', 
        'gender', 
        'id_number', 
        'phone_number', 
        'address',
        'education_level', 
        'form4_results', 
        'has_business', 
        'business_type',
        'business_duration', 
        'monthly_income', 
        'business_idea', 
        'sectors',
        'previous_training', 
        'previous_training_details', 
        'has_startup_assets', 
        'startup_assets_details', 
        'motivation_reason', 
        'future_expectations',
        'passport_photo_path',
        'id_document_path', 
        'introduction_letter_path', 
        'declaration_accepted'
    ];

    protected $casts = [
        'has_business' => 'boolean',
        'previous_training' => 'boolean',
        'has_startup_assets' => 'boolean',
        'declaration_accepted' => 'boolean',
        'sectors' => 'array', 
        'dob' => 'date',
    ];
}