<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Participant extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    // Relasi peserta dengan data pendaftaran
    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    // Relasi peserta dengan kursus
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'enrollments')
            ->withPivot('status')
            ->withTimestamps();
    }
}
