<?php

namespace App\Http\Requests;

use App\Traits\ErrorResponseJson;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    use ErrorResponseJson;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'picture' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',

            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'email.unique' => 'Email is already taken',

            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
        ];
    }
}
