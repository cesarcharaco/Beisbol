<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepresentantesRequest extends FormRequest
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
            'nombres' => 'required',
            'apellidos' => 'required',
            'nacionalidad' => 'required',
            'cedula' => 'required|digits_between:6,8|numeric',
            'direccion' => 'required',
            'cod1' => 'required|numeric',
            'telf1' => 'required|digits_between:6,8|numeric'
        ];
    }

    public function messages()
    {
        return [
            'nombres.required' => 'Los nombres son obligatorios',
            'apellidos.required' => 'Los apellidos son obligatorios',
            'nacionalidad.required' => 'Debe seleccionar la nacionalidad del representante',
            'cedula.required' => 'La cédula es obligatoria',
            'cedula.digits_between' => 'La cédula debe contener entre 6 y 8 dígitos',
            'cedula.numeric' => 'La cédula debe contener solo numeros',
            'cod1.required' => 'Debe seleccionar el código del teléfono principal',
            'telf1.required' => 'El número de teléfono es obligatorio'
        ];
    }
}
