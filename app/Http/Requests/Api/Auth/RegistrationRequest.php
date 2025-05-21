<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "username" => ["required", "string", "min:8", "unique:users,username"],
            "email" => ["required", "email", "unique:users,email"],
            "password" => ["required", "string", "min:8"],
        ];
    }

    public function messages()
    {
        return [
            "email.unique" => "Email Already Exists",
            "username.unique" => "Username Already Exists"
        ];
    }
}
