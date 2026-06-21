<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHeroSectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'heading' => 'required|string|max:255',
            'banner' => 'nullable|image|max:5120',
            'subheading' => 'nullable|string|max:255',
            'achievement' => 'nullable|string',
            'path_video' => 'nullable|string|max:255',
        ];
    }
}