<?php

namespace App\Contracts\Services;

use App\DTOs\ProductFilterDto;
use Illuminate\Contracts\Pagination\Paginator;

interface ProductServiceContract
{
    public function withFilters(ProductFilterDto $filters): static;
    public function paginate() : Paginator;
}
