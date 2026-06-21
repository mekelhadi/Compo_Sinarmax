<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestimonialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'message' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'project_client_id' => 'required|exists:project_clients,id',
        ];
    }
}