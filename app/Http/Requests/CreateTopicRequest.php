<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTopicRequest extends FormRequest
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
            'title' => ['required', 'max:50', 'min:5'],
            'category' => ['required'],
            'content' => ['required', 'max:500', 'min:1'],
        ];
    }

    /**
     * Definición de los mensajes de validación.
     *
     * @return array
     */
    public function messages()
    {
        return[
        'title.required' => 'Introduzca un título válido.',
        'title.max' => 'Introduzca un título menor de 50 carácteres.',
        'title.min' => 'Introduzca un título mayor de 5 carácteres.',

        'category.required' => 'Introduzca una categoría válida.',

        'content.required' => 'Introduzca una contenido válido.',
        'content.max' => 'Introduzca un contenido menor de 500 carácteres.',
        'content.min' => 'Introduzca un contenido mayor de 1 carácteres.',
        ];
    }
}