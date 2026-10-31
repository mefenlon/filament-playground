<?php

namespace App\Models;

use App\Models\Concerns\HasSchemalessAttributes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Personable extends MorphPivot
{

    protected $table = 'personables';

    public $incrementing = true;

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'person_id', 'id', 'person');
    }

    public function personable(): MorphTo
    {
        return $this->morphTo();
    }
}
