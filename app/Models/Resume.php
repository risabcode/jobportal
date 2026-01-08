<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Resume extends Model
{
    protected $fillable = [
        'candidate_id',
        'filename',
        'path',
        'mime',
        'size',
        'uploaded_at',
    ];

    protected $casts = [
        'uploaded_at' => 'datetime',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function getDownloadUrlAttribute()
    {
        return route('admin.candidates.resume.download', $this->id);
    }

    public function deleteFile()
    {
        if (Storage::exists($this->path)) {
            Storage::delete($this->path);
        }
    }
}
