<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
            'descripcion' => '',
           
        ];
    }


    public function messages(){

        return [
            'nombre.required' => 'Es necesario ingresar el nombre de la sucursal',
            'nombre.max' => 'El nombre debe tener menos de 200 caracteres',
            
        
            ];
    }
}
