<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'email' => 'Digite o e-mail',
            'email' => 'E-mail inválido',
            'password.required' => 'Digite a senha',
            'password.min' => 'Digite a senha com no minimo 3 caracteres'
        ];
    }
}
