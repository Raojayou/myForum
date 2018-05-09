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
        $rules = array();

        $rules['title'] = $this->validateTitle();
        $rules['category'] = $this->validateCategory();
        $rules['content'] = $this->validateContent();

        return $rules;
    }

    /**
     * Definición de los mensajes de validación.
     *
     * @return array
     */
    public function messages()
    {
        $mensajesTitle = $this->mensajesTitle();
        $mensajesCategory = $this->mensajesCategory();
        $mensajesContent = $this->mensajesContent();

        $mensajes = array_merge(

            $mensajesTitle,
            $mensajesCategory,
            $mensajesContent

        );
        return $mensajes;
    }

    protected function validateTitle()
    {
        return 'required|string|max:50|min:1';
    }

    protected function mensajesTitle()
    {
        $mensajes = array();
        $mensajes["title.required"] = 'Introduzca el título.';
        $mensajes["title.string"] = 'Error en el título.';
        $mensajes["title.max"] = 'Supera el máximo de 50 carácteres.';
        $mensajes["title.min"] = 'No supera el mínimo de 1 carácter.';

        return $mensajes;
    }

    protected function validateCategory()
    {
        return 'required';
    }

    protected function mensajesCategory()
    {
        $mensajes = array();
        $mensajes["category.required"] = 'Seleccione una categoría válida.';

        return $mensajes;
    }

    protected function validateContent()
    {
        return 'required|text|max:500|min:1';
    }

    protected function mensajesContent()
    {
        $mensajes = array();
        $mensajes["content.required"] = 'Introduzca un contenido válido.';
        $mensajes["content.text"] = 'Introduzca un contenido válido.';
        $mensajes["content.max"] = 'Supera el máximo de 500 carácteres.';
        $mensajes["content.min"] = 'No supera el mínimo de 1 carácter.';

        return $mensajes;
    }
}