<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

trait HasSlug
{
    public function slug(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Str::slug($value ?? $this->name)
        );
    }
}
