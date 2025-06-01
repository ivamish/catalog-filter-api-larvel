<?php

namespace App\Http\Requests\Product;

use App\Contracts\DTOs\ToDtoAdapter;
use App\DTOs\ProductFilterDto;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use ReflectionException;

class ProductFiltersRequest extends FormRequest implements ToDtoAdapter
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'properties' => ['nullable', 'array'],
            'properties.*' => ['array'],
            'properties.*.*' => ['string'],
        ];
    }

    /**
     * @throws ReflectionException
     */
    public function toDto(): ProductFilterDto
    {
        return ProductFilterDto::fromArray($this->validated());
    }
}
