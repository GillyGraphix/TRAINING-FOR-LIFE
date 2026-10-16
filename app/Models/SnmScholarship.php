<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnmScholarship extends Model
{
    use HasFactory;

    protected $guarded = []; // Inaruhusu fields zote kuingizwa

    // Hii inabadilisha data type moja kwa moja
    protected $casts = [
        'dob' => 'date',
        'was_school_leader' => 'boolean',
        'single_parent' => 'boolean',
        'has_disability' => 'boolean',
        'has_dependents' => 'boolean',
        'declaration_accepted' => 'boolean',
        'parent_consent_accepted' => 'boolean',
        'support_needed' => 'array', // Inahifadhi checkboxes vizuri kwenye DB
    ];
}