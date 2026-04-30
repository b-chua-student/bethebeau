<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id'     => ['required', 'exists:users,id'],
            'shipped_to'  => ['required', 'string'],
            'status'      => ['required', 'in:pending,confirmed,processing,shipped,delivered,cancelled,refunded,failed'],
            'total_price' => ['required', 'numeric', 'min:0'],
        ];
    }
}
