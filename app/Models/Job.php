<?php

namespace App\Models;

use App\Models\WorkType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'recruiter_id', 'company_id', 'title', 'job_functions', 'qualifications', 'locaiton', 'work_type_id', 'experieince', 'term', 'min_salary', 'max_salary', 'deadline', 'description', 'created_at', 'updated_at'
    ];


    public function worktype()
    {
        return $this->hasOne(WorkType::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
    
}
