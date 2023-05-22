<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'institution', 'qualification_id', 'start_date', 'end_date', 'description', 'created_at', 'updated_at'
    ];


    //===========RELATONSHIP===============//
    

}
