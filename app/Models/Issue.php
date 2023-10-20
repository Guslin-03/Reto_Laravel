<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Issue extends Model
{
    use HasFactory;

    public function incidencia_categoria(): BelongsTo {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function incidencia_estado(): BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function incidencia_usuario(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function incidencia_departamento(): BelongsTo {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function incidencia_prioridad(): BelongsTo {
        return $this->belongsTo(Priority::class, 'priority_id');
    }

    public function incidencia_comentarios(): HasMany {
        return $this->hasMany(Comment::class);
    }

}
