<?php

namespace App\Services;

use App\Contracts\Repositories\ProductRepositoryContract;
use App\Contracts\Services\ProductServiceContract;
use App\DTOs\ProductFilterDto;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;

class ProductService implements ProductServiceContract
{
    private ProductFilterDto|null $dto = null;
    public function __construct(
        private readonly ProductRepositoryContract $productRepository
    )
    {
    }

    public function withFilters(ProductFilterDto $filters): static
    {
        $this->dto = $filters;
    }

    public function paginate(): Paginator
    {
        return $this->productRepository
            ->paginate($this->dto)
            ->through(fn (Product $product) => new ProductResource($product));
    }
}
