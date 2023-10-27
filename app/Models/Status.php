<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Status extends Model
{
    use HasFactory;

    public function estado_incidencia(): BelongsTo {
        return $this->belongsTo(Issue::class, 'issue_id');
    }

    public function ultimas_issues(): HasMany {
        return $this->hasMany(Issue::class, 'status_id')->latest()->take(5);
    }

}
