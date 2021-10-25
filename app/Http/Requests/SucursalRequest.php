<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SucursalRequest extends FormRequest
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
            'nombre' => 'required|max:200',
            'domicilio' => 'required|max:80',
            'telefono' => 'required|max:20',
        ];
    }


    public function messages(){

        return [
            'nombre.required' => 'Es necesario ingresar el nombre de la sucursal',
            'nombre.max' => 'El nombre debe tener menos de 200 caracteres',
            'domicilio.required' => 'Es necesario ingresar el domicilio de la sucursal',
            'domicilio.max' => 'El domicilio debe tener menos de 200 caracteres',
            'telefono.required' => 'Es necesario ingresar el telefono de la sucursal',
            'telefono.max' => 'El telefono debe tener menos de 20 caracteres',
  
            ];
    }
}
