<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends MainRequest
{

    public function rules(): array
    {
        return [
            'email'=>['required','string'],
            'password'=>['required','string'],
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>__('api/auth/loginRequest.email.required'),
            'password.required'=>__('api/auth/loginRequest.email.required')
        ];
    }
}
