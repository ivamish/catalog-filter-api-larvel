<?php

namespace App\Models;

use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name', 'slug'];

    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('value');
    }
}
