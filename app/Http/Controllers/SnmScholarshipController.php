<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SnmScholarship;

class SnmScholarshipController extends Controller
{
    // Kuonyesha fomu (Tutatengeneza blade yake baadaye)
    public function create()
    {
        return view('scholarships.snm_create'); 
    }

    // Kupokea, kuhakiki, kupiga hesabu, na kusave
    public function store(Request $request)
    {
        // 1. Validation (Hakiki kama data zipo na ni sahihi)
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'national_id' => 'nullable|string',
            'phone_number' => 'required|string',
            'home_address' => 'required|string',
            
            'current_school' => 'required|string',
            'current_class' => 'required|string',
            'education_status' => 'required|string',
            'reason_for_leaving' => 'nullable|string',
            'form_four_results' => 'nullable|string',
            'was_school_leader' => 'nullable|boolean',
            'leadership_role' => 'nullable|string',
            
            'orphan_status' => 'required|string',
            'single_parent' => 'nullable|boolean',
            'has_disability' => 'nullable|boolean',
            'disability_type' => 'nullable|string',
            'has_dependents' => 'nullable|boolean',
            'household_situation' => 'nullable|string',
            
            'need_reason' => 'required|string',
            'career_goals' => 'required|string',
            'support_needed' => 'nullable|array',
            
            // Nyaraka - Max 5MB (5120 KB)
            'report_card' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'recommendation_letter' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'parent_id' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'passport_photo' => 'required|file|mimes:jpg,jpeg,png|max:5120',
            
            'declaration_accepted' => 'accepted',
            'parent_consent_accepted' => 'accepted',
        ]);

        // 2. PRIORITY SCORING LOGIC (Maksi za Kipaumbele)
        $score = 0;

        // Elimu (Education Status) - Vipaumbele vya Juu
        if ($request->education_status === 'Dropped out of school (advanced secondary — Form 5/6)') {
            $score += 50; 
        } elseif ($request->education_status === 'Currently at risk of dropping out') {
            $score += 40;
        } elseif ($request->education_status === 'Completed Form 4, at risk of not continuing to Form 5/6') {
            $score += 30;
        }

        // Ufaulu Form 4 (Div I/II)
        $results = strtoupper($request->form_four_results);
        if (str_contains($results, 'DIV I') || str_contains($results, 'DIV II') || str_contains($results, 'DIV 1') || str_contains($results, 'DIV 2')) {
            $score += 20;
        }

        // Uongozi Shuleni
        if ($request->was_school_leader) $score += 10;

        // Vigezo vya Uhatari (Vulnerability)
        if ($request->orphan_status === 'Both parents deceased') {
            $score += 30;
        } elseif ($request->orphan_status === 'One parent deceased') {
            $score += 15;
        }
        if ($request->has_disability) $score += 20;
        if ($request->single_parent) $score += 15;
        if ($request->has_dependents) $score += 15;

        // 3. Hifadhi Nyaraka (File Uploads)
        $paths = [];
        $paths['report_card_path'] = $request->file('report_card')->store('snm_documents', 'public');
        $paths['recommendation_letter_path'] = $request->file('recommendation_letter')->store('snm_documents', 'public');
        $paths['passport_photo_path'] = $request->file('passport_photo')->store('snm_documents', 'public');
        
        if ($request->hasFile('parent_id')) {
            $paths['parent_id_path'] = $request->file('parent_id')->store('snm_documents', 'public');
        }

        // 4. Jumuisha Taarifa Zote na Hifadhi (Save to DB)
        $applicationData = array_merge(
            $request->except(['report_card', 'recommendation_letter', 'parent_id', 'passport_photo', '_token']),
            $paths,
            ['priority_score' => $score] // Tunaingiza ile score tuliyopiga hesabu hapo juu
        );

        // Geuza boolean fields ambazo haziku-checkiwa kuwa false (kama zipo tupu)
        $applicationData['was_school_leader'] = $request->has('was_school_leader');
        $applicationData['single_parent'] = $request->has('single_parent');
        $applicationData['has_disability'] = $request->has('has_disability');
        $applicationData['has_dependents'] = $request->has('has_dependents');

        SnmScholarship::create($applicationData);

        // 5. Mpeleke mwanafunzi ukurasa wa ujumbe wa mafanikio
        return back()->with('success', 'Maombi yako ya Soma na Matumaini Scholarship yamewasilishwa kikamilifu! TFL itawasiliana nawe.');
    }
}