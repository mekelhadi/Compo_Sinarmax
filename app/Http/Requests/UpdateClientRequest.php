<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'occupation' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|max:2048',
            'logo' => 'nullable|image|max:2048',
        ];
    }
}