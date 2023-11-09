<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Issue;

class Comment extends Model
{
    use HasFactory;

    public function comentario_incidencia(): BelongsTo {
        return $this->belongsTo(Issue::class, 'issue_id');
    }
    public function comentario_usuario(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

}
