<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function categoria_incidencias(): HasMany {
        return $this->hasMany(Issue::class);
    }

    public function ultimas_issues(): HasMany {
        return $this->hasMany(Issue::class, 'category_id')->latest()->take(5);
    }
}
