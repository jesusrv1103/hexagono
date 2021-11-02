<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'codigo' => 'required|max:200',
            'nombre' => 'required|max:200',
            'imagen' => '',
            'medida' => '',
            'tipo_producto' => 'required',
            'categoria_id' => 'required',
            'material' => '',
            'precio_compra' => '',
            'precio_venta' => 'required',
            'descripcion' => '',
        ];
    }


    public function messages(){

        return [
            'nombre.required' => 'Es necesario ingresar el nombre del producto',
            'codigo.required' => 'Es necesario ingresar el codigo del producto',
            'nombre.max' => 'El nombre debe tener menos de 200 caracteres',
            'precio_compra.required' => 'Es necesario ingresar el precio de compra del producto',
            'precio_venta.required' => 'Es necesario ingresar el precio de venta del producto',
           
  
            ];
    }
}

