<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;

    protected $table = 'cv';
    protected $fillable = ['user_id', 'doc_url', 'created_at', 'updated_at'];
}
