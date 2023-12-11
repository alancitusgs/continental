<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class RequestTemporada extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            'anio_inicio' => 'required',
            'anio_fin' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'anio_inicio.required'=>'Debes seleccionar el año de inicio',
            'anio_fin.required'=>'Debes seleccionar el año de fin'
        ];
    }


}
