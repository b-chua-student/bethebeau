<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Set to true if no specific authorization logic is needed here
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name'        => ['required', 'string', 'max:255'],
            'last_name'         => ['required', 'string', 'max:255'],
            'email'             => ['required', 'email', 'unique:users,email'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
            'instagram_account' => ['nullable', 'string', 'unique:users,instagram_account'],
            'address'           => ['nullable', 'string'],
            'role'              => ['required', 'in:user,guest,admin'],
        ];
    }
}
