<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    public function departamento_usuarios(): HasMany {
        return $this->hasMany(User::class);
    }

    public function ultimas_issues(): HasMany {
        return $this->hasMany(Issue::class, 'department_id')->latest()->take(5);
    }

}
