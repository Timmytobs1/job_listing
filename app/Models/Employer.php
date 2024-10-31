<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employer extends Model
{
    use HasFactory;

    public function jobs (): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Employer::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
