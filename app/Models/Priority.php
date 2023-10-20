<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Priority extends Model
{
    use HasFactory;

    public function prioridad_incidencia(): BelongsTo {
        return $this->belongsTo(Issue::class, 'issue_id');
    }
}