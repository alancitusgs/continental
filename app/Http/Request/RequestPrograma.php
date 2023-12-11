<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class RequestPrograma extends FormRequest
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
            'nombre' => 'required|string|max:100'
           // 'id_temporada' => 'required'
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
            'nombre.required'=>'Debes ingresar un nombre',
            'nombre.max'=>'El nombre no debe superar los 100 caracteres'
           // 'id_temporada.required'=>'Debe seleccionar la temporada'
        ];
    }


}
