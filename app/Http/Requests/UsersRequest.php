<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"=>'required|string',
            "email"=>'required|email|unique:users',
            "image"=>'image|mimes:png,jpg,jpegs',
            "password"=>'required|string',
            "password_confirmation"=>'required|same:password',
        ];
    }
}
