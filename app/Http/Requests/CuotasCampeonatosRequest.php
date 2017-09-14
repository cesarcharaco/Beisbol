<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuotasCampeonatosRequest extends FormRequest
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
            'monto' => 'required',
            'campeonato' => 'required',
            'anio' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'monto.required' => 'Debe ingresar un monto',
            'campeonato.required' => 'Debe Seleccionar un Campeonato',
            'anio.required' => 'Debe Seleccionar un Año'
        ];
    }
}
