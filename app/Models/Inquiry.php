<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
    ];

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }
}
