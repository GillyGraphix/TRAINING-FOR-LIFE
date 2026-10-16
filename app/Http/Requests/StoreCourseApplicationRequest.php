<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Ruhusu mtu yeyote kutuma fomu
    }

    public function rules(): array
    {
        return [
            'student_name' => 'required|string|max:255',
            'current_address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'dob' => 'required|date',
            'place_of_residence' => 'required|string|max:255',
            'religion' => 'nullable|string|max:100',
            
            'parent_name' => 'required|string|max:255',
            'parent_occupation' => 'nullable|string|max:255',
            'parent_address' => 'nullable|string|max:255',
            'parent_phone' => 'required|string|max:20',
            'parent_email' => 'nullable|email|max:255',
            
            'mock_results' => 'required|string|max:50',
            'school' => 'required|string|max:255',
            'form_4_year' => 'required|digits:4', // Kuhakikisha inaingizwa miaka 4, mfano 2026
            
            'life_skills_essay' => 'required|string',
        ];
    }
}