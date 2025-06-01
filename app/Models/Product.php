<?php

namespace App\Models;

use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name', 'slug', 'price', 'quantity'];

    public function properties() : BelongsToMany
    {
        return $this->belongsToMany(Property::class)->withPivot('value');
    }
}
