<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'meeting_at' => 'required|date',
            'brief' => 'required|string',
            'product_id' => 'nullable|exists:products,id',
            'other_product' => 'nullable|string|max:255',
        ];
    }
}