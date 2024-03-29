<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\CV;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use App\Models\WorkExperience;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'phone', 'gender', 'dob', 'languages', 'industries_id', 'allow_search', 'user_level', 'email_verified_at', 'password', 'description', 'facebook', 'linkedin', 'twitter', 'googleplus', 'country', 'state', 'address', 'remember_token', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    ===========================RELATIONSHIPS===========================
    */
    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function workexperience(): HasMany
    {
        return $this->hasMany(WorkExperience::class);
    }
    
    public function portfolios(): HasMany
    {
        return $this->hasMany(Portfolio::class);
    }

    public function awards(): HasMany
    {
        return $this->hasMany(Award::class);
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class);
    }

    public function portfolioimages(): HasMany
    {
        return $this->hasMany(PortfolioImage::class);
    }

    public function education(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function cvs(): HasMany
    {
        return $this->hasMany(CV::class);
    }

    public function profilepicture(): HasOne
    {
        return $this->hasOne(ProfilePicture::class);
    }
}
