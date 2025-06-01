<?php

namespace App\Http\Controllers;

use App\Contracts\Services\ProductServiceContract;
use App\Http\Requests\Product\ProductFiltersRequest;
use Illuminate\Http\Resources\Json\ResourceResponse;
use ReflectionException;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductServiceContract $productService
    )
    {
    }

    /**
     * @throws ReflectionException
     */
    public function index(ProductFiltersRequest $request) : ResourceResponse
    {
        $this->productService
            ->withFilters($request->toDto())
            ->paginate();
    }
}
