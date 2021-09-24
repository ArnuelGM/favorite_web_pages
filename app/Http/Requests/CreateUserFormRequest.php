<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateUserFormRequest
 * @package App\Http\Requests
 */
class CreateUserFormRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required||email',
            'password' => 'required||min:8',
            'password2' => 'required||same:password'
        ];
    }

    /**
     * @return array|void
     */
    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio!',
            'email.required' => 'El :attribute es obligatorio!',
            'email.unique' => 'Ingrese un :attribute que no haya sido registrado antes',
            'password.required' => 'La :attribute es obligatoria',
            'password.min' => 'La :attribute debe contener mínimo 8 caracteres',
            'password2.required' => 'La :attribute es obligatoria',
            'password2.same' => 'La :attribute no coincide con la contraseña ingresada'
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'name' => 'nombre',
            'email' => 'correo',
            'password' => 'contraseña',
            'password2' => 'confirmación de contraseña'
        ];
    }
}
