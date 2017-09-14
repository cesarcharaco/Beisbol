<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtletasRequest extends FormRequest
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
            'primer_nombre' => 'required',
            'primer_apellido' => 'required',
            'nacionalidad' => 'required',
            'fecha_nac' => 'required',
            'id_estado' => 'required|numeric',
            'id_municipio' => 'required|numeric',
            'id_parroquia' =>  'required|numeric'

        ];
    }

    public function messages()
    {
        return [
            'primer_nombre.required' => 'El Primer Nombre es Obligatorio',
            'primer_apellido.required' => 'El Primer Apellido es Obligatorio',
            'nacionalidad.required' => 'Debe Seleccionar la Nacionalidad',
            'fecha_nac.required' => 'La Fecha de Nacimiento es Obligatoria',
            'id_estado.required' => 'Debe Seleccionar un estado',
            'id_municipio.required' => 'Debe Seleccionar un Municipio',
            'id_parroquia.required' =>  'Debe Seleccionar una Parroquia',
            'id_estado.numeric' => 'Debe Seleccionar del Estado',
            'id_municipio.numeric' => 'Debe Seleccionar el Municipio',
            'id_parroquia.numeric' => 'Debe Seleccionar la Parroquia'

        ];   
    }
}
