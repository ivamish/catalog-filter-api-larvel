<?php

namespace App\DTOs;

use App\Contracts\DTOs\ArrayCreatable;
use App\Contracts\DTOs\DtoContract;

/**
 * @property-read array<string, string[]> $properties
 */
class ProductFilterDto implements ArrayCreatable, DtoContract
{
    use Traits\HasFromArray;

    public function __construct(
        public readonly array $properties
    )
    {
    }
}
