<?php

namespace App\Http\Controllers;

use App\Contracts\Services\ProductServiceContract;
use App\Http\Requests\Product\ProductFiltersRequest;
use Illuminate\Http\JsonResponse;
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
    public function index(ProductFiltersRequest $request) : JsonResponse
    {
        return response()->json(
            $this->productService
                ->withFilters($request->toDto())
                ->paginate()
        );
    }
}
