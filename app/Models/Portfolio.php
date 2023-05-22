<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_title', 'project_role', 'project_task', 'project_solution', 'images', 'created_at', 'updated_at'
    ];

    public function portfolioimages(): HasMany
    {
        return $this->hasMany(PortfolioImage::class);
    }


}
