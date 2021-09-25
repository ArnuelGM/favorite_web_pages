<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginUserFormRequest
 * @package App\Http\Requests
 */
class LoginUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required||email',
            'password' => 'required||min:8',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
          'email.required' => 'El campo :attribute debe ser diligenciado',
          'email.email' => 'El usuario debe ser un correo electrónico',
          'password.required' => 'El campo :attribute debe ser diligenciado',
          'password.min' => 'La :attribute debe contener mínimo 8 caracteres'
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'email' => 'Usuario',
            'password' => 'contraseña'
        ];
    }
}
