<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'job_id', 'cv_id', 'cover_letter_id', 'portfolio_links', 'hiring_stage_id', 'applied_date', 'status', 'answers', 'is_viewed', 'created_at', 'updated_at'
    ];
}
