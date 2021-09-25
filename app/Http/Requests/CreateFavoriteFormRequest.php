<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateFavoriteFormRequest
 * @package App\Http\Requests
 */
class CreateFavoriteFormRequest extends FormRequest
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
            'title' => 'required|max:100',
            'url' => 'required|url|max:200',
            'description' => 'required',
            'visibility' => 'required|boolean'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El titulo es obligatorio',
            'title.max' => 'El titulo no debe exceder los 100 caracteres',
            'url.required' => 'La url es obligatoria',
            'url.url' => 'El formato de la url no es valido',
            'url.max' => 'La url no debe exceder los 200 caracteres',
            'description.required' => 'La descripción es obligatoria',
            'visibility.required' => 'La selección de visibilidad es obligatoria'
        ];
    }
}
