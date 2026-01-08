<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    /**
     * IMPORTANT: actual table name
     */
    protected $table = 'job_posts';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'location',
        'employment_type',
        'status',
        'posted_at',
    ];

    protected $casts = [
        'posted_at' => 'datetime',
    ];

    /**
     * Automatically generate slug
     */
    protected static function booted()
    {
        static::creating(function ($job) {
            if (empty($job->slug)) {
                $job->slug = Str::slug($job->title);
            }
        });
    }

    /**
     * ✅ THIS IS WHAT YOU ARE MISSING
     * Enables Job::published()
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
