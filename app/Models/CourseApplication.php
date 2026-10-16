<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name', 
        'current_address', 
        'phone_number', 
        'email', 
        'dob', 
        'place_of_residence', 
        'religion',
        'parent_name', 
        'parent_occupation', 
        'parent_address', 
        'parent_phone', 
        'parent_email',
        'mock_results', 
        'school', 
        'form_4_year',
        'life_skills_essay', 
        'status'
    ];
}