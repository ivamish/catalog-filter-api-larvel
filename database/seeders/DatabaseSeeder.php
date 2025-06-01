<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Property;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $properties = Property::factory()->count(10)->create();

        Product::factory()->count(100)->create()->each(function ($product) use ($properties) {
            $product->properties()->attach(
                $properties->random(rand(1, 3))->pluck('id')->mapWithKeys(function ($propertyId) {
                    return [$propertyId => ['value' => fake()->word()]];
                })->toArray()
            );
        });
    }
}
