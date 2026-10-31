<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Language extends Model
{
    use HasFactory;

    public function titles(): MorphToMany
    {
        return $this->morphedByMany(Title::class, 'languageable', 'languageables', 'language_id', 'languageable_id')
            ->withTimestamps()
            ->withPivot('id', 'text');
    }
}
