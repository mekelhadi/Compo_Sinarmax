<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrincipleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subtitle' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|max:2048',
            'icon' => 'nullable|image|max:2048',
        ];
    }
}