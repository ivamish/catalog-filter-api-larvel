<?php

namespace App\DTOs;

use App\Contracts\DTOs\ArrayCreatable;
use App\Contracts\DTOs\DtoContract;
use App\Traits\DTOs\HasFromArray;

/**
 * @property-read array<string, string[]> $properties
 */
class ProductFilterDto implements ArrayCreatable, DtoContract
{
    use HasFromArray;

    public function __construct(
        public readonly array $properties
    )
    {
    }
}
