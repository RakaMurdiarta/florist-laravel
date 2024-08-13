<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BaseModel extends Model
{
    use HasFactory, HasUuids;

    public static function booted()
    {
        // automaticly creating uuid for primary key column for model
        static::creating(fn($model) => $model->id = Str::uuid());
    }

}
