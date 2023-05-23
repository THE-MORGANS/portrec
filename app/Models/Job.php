<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'recruiter_id', 'company_id', 'title', 'job_functions', 'qualifications', 'locaiton', 'work_type_id', 'experieince', 'term', 'min_salary', 'max_salary', 'deadline', 'description', 'created_at', 'updated_at'
    ];

    
}
