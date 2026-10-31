<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Title extends Model
{
    use HasFactory;
    public function cities(): BelongsToMany
    {
        return $this->belongsToMany(City::class)
            ->withPivot('id', 'text');
    }
    public function languages(): MorphToMany
    {
        return $this->morphToMany(Language::class, 'languageable')
            ->withTimestamps()
            ->withPivot('id', 'text');
    }

    public function people(): MorphToMany
    {
        return $this->morphToMany(Person::class, 'personable', 'personables', 'personable_id', 'person_id')
            ->using(Personable::class)
            ->withTimestamps()
            ->withPivot('id', 'role', 'text');
    }
}
