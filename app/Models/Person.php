<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Person extends Model
{
    use HasFactory;

    public function titles(): MorphToMany
    {
        return $this->morphedByMany(Title::class, 'personable', 'personables', 'person_id', 'personable_id')
            ->withTimestamps()
            ->withPivot('id', 'role', 'text');
    }
}
