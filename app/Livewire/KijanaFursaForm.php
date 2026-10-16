<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\KijanaFursaApplication;

class KijanaFursaForm extends Component
{
    use WithFileUploads; // Hii inaruhusu Livewire kupokea mafaili/picha

    // Hizi variables (properties) zinaendana na wire:model zilizo kwenye fomu
    public $full_name;
    public $dob;
    public $gender;
    public $id_number;
    public $phone_number;
    public $address;
    public $education_level;
    public $form4_results;
    public $has_business;
    public $business_type;
    public $business_duration;
    public $monthly_income;
    public $business_idea;
    public $sectors = []; // Kwa checkbox inabidi iwe array
    public $previous_training;
    public $previous_training_details;
    public $has_startup_assets;
    public $startup_assets_details;
    public $motivation_reason;
    public $future_expectations;
    
    // Kwa ajili ya mafaili
    public $passport_photo_path;
    public $id_document_path;
    public $introduction_letter_path;
    
    public $declaration_accepted;

    // Hali ya kuonyesha kama imetumwa kikamilifu (Success message)
    public $isSubmitted = false;

    // Rules za Validation (Kuhakikisha mtu hajazi uchafu)
    protected $rules = [
        'full_name' => 'required|string|max:255',
        'dob' => 'required|date',
        'gender' => 'required|in:Mwanaume,Mwanamke',
        'phone_number' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'education_level' => 'required|string',
        'has_business' => 'required|boolean',
        'sectors' => 'required|array|min:1',
        'previous_training' => 'required|boolean',
        'has_startup_assets' => 'required|boolean',
        'motivation_reason' => 'required|string|min:10',
        'future_expectations' => 'required|string|min:10',
        'declaration_accepted' => 'required|accepted',
        'passport_photo_path' => 'required|image|max:5120', // 5MB
        'id_document_path' => 'required|file|mimes:pdf,jpg,jpeg,png|max:15360',
        'introduction_letter_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
    ];

    public function submit()
    {
        // 1. Hakikisha taarifa zipo sawa
        $this->validate();

        // 2. Safisha njia (paths) za kuhifadhia mafaili kwenye public storage
        $passportPath = $this->passport_photo_path ? $this->passport_photo_path->store('applications/passports', 'public') : null;
        $idDocPath = $this->id_document_path ? $this->id_document_path->store('applications/id_docs', 'public') : null;
        $introLetterPath = $this->introduction_letter_path ? $this->introduction_letter_path->store('applications/letters', 'public') : null;

        // 3. Save kwenye Database (Sasa Admin ataiona kule kwenye Dashboard!)
        KijanaFursaApplication::create([
            'full_name' => $this->full_name,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'id_number' => $this->id_number,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'education_level' => $this->education_level,
            'form4_results' => $this->form4_results,
            'has_business' => $this->has_business,
            'business_type' => $this->business_type,
            'business_duration' => $this->business_duration,
            'monthly_income' => $this->monthly_income,
            'business_idea' => $this->business_idea,
            'sectors' => $this->sectors, // Iko casted as 'array' kwenye Model
            'previous_training' => $this->previous_training,
            'previous_training_details' => $this->previous_training_details,
            'has_startup_assets' => $this->has_startup_assets,
            'startup_assets_details' => $this->startup_assets_details,
            'motivation_reason' => $this->motivation_reason,
            'future_expectations' => $this->future_expectations,
            'passport_photo_path' => $passportPath,
            'id_document_path' => $idDocPath,
            'introduction_letter_path' => $introLetterPath,
            'declaration_accepted' => true,
        ]);

        // 4. Badilisha hali kuwa Imewasilishwa ili ifiche fomu na kuleta "Hongera!"
        $this->isSubmitted = true;
    }

    public function render()
    {
        // Hii inachukua ile kodi uliyonitumia (tuliyoiweka kwenye livewire/kijana-fursa-form.blade.php)
        return view('livewire.kijana-fursa-form');
    }
}