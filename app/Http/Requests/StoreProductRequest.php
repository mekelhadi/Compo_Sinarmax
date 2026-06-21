<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:products,name',
            'tagline' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|max:2048',
            'about' => 'nullable|string',
        ];
    }
}