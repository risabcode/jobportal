<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'preferred_location',
        'experience_years',
        'notes',
    ];

    protected $casts = [
        'experience_years' => 'decimal:1',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function getFullNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}
