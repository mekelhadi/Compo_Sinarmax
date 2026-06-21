<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'avatar' => 'nullable|image|max:2048',
            'name' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
        ];
    }
}