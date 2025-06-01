<?php

namespace App\Models;

use App\DTOs\ProductFilterDto;
use App\Models\Traits\HasSlug;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 *
 *
 * @property-read Collection<int, Property> $properties
 * @property-read int|null $properties_count
 * @property-write mixed $slug
 * @method static ProductFactory factory($count = null, $state = [])
 * @method static Builder<static>|Product newModelQuery()
 * @method static Builder<static>|Product newQuery()
 * @method static Builder<static>|Product query()
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name', 'slug', 'price', 'quantity'];

    public function properties() : BelongsToMany
    {
        return $this->belongsToMany(Property::class)->withPivot('value');
    }

    /**
     * @param Builder $query
     * @param ProductFilterDto $filters
     * @return Builder
     */
    public function scopeFilterByProperties(Builder $query, ProductFilterDto $filters): Builder
    {
        foreach ($filters->properties as $propertySlug => $values) {
            $query->whereHas('properties', function ($q) use ($propertySlug, $values) {
                $q->where('slug', $propertySlug)
                    ->whereIn('product_property.value', (array)$values);
            });
        }

        return $query;
    }
}
