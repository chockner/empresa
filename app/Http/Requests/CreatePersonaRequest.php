<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePersonaRequest extends FormRequest
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
    public function rules()
    {
        return [
            'cPerApellido' => 'required',
            'cPerNombre' => 'required',
            'cPerDireccion' => 'required',
            'dPerFecNac' => 'required',
            'nPerEdad' => 'required',
            'cPerSexo' => 'required',
            'nPerSueldo' => 'required',
            'nPerEstado' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'cPerApellido.required' => 'Se necesita un Apeliido',
            'cPerNombre.required' => 'Se necesita un Nombre',
            'cPerDireccion.required' => 'Se necesita una Direccion',
            'dPerFecNac.required' => 'Se necesita una Fecha de Nacimiento',
            'nPerEdad.required' => 'Se necesita una edad',
            'cPerSexo.required' => 'Se necesita un Sexo',
            'nPerSueldo.required' => 'Se necesita un Sueldo',
            'nPerEstado.required' => 'Se necesita el Estado Civil'
        ];
    }
}
