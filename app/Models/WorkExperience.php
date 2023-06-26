<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'company_name', 'company_location', 'start_date', 'end_date', 'job_title', 'job_level', 'industries_id', 'job_function_id', 'salary_range', 'work_type_id', 'description', 'status'
    ];

    /**
     * Get the User that owns the Work Experience.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
