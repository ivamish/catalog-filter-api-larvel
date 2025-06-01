<?php

namespace App\Contracts\Repositories;

use App\DTOs\ProductFilterDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;

interface ProductRepositoryContract
{
    public function paginate(?ProductFilterDto $dto = null) : Paginator;
}
