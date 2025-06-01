<?php

namespace App\Contracts\Repositories;

use App\DTOs\ProductFilterDto;

interface ProductRepositoryContract
{
    public function paginate(?ProductFilterDto $dto);
}
