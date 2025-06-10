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
            
            "first_name" => ["required", "string"],
            "last_name" => ["required", "string"],
            "middle_name" => ["nullable", "string"],
            "mobile" => ["required", "string"],
            "suffix" => ["nullable", "string"],

            "country" => ["required", "string"],
            "city" => ["required", "string"],
            "province" => ["required", "string"],
            "region" => ["required", "string"],
            "barangay" => ["required", "string"],
            "detail" => ["required", "string"],
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
