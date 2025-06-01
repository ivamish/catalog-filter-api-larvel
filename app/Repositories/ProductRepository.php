<?php

namespace App\Repositories;

use App\Contracts\Repositories\ProductRepositoryContract;
use App\DTOs\ProductFilterDto;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class ProductRepository implements ProductRepositoryContract
{
    public function paginate(?ProductFilterDto $dto = null): Paginator
    {
        return Product::query()
            ->where('price', '>', 0)
            ->where('quantity', '>', 0)
            ->when($dto !== null, function (Builder $query) use ($dto) {
                $query->FilterByProperties($dto);
            })->simplePaginate(15);
    }
}
