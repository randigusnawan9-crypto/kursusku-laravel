<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'duration',
        'start_date',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'duration' => 'integer',
            'start_date' => 'date',
            'is_active' => 'boolean',
        ];
    }

    // Relasi kursus dengan data pendaftaran
    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    // Relasi kursus dengan peserta
    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(Participant::class, 'enrollments')
            ->withPivot('status')
            ->withTimestamps();
    }
}
