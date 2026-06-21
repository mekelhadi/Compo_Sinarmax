<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|' . Rule::unique('products')->ignore($this->route('product')),
            'tagline' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|max:2048',
            'about' => 'nullable|string',
        ];
    }
}