<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nombre' => 'required|string|max:100|min:2',
            'rfc' => 'required|string|max:40|min:4',
            'correo' => 'required|string|max:80|min:4',
            'telefono' => 'required|string|max:12|min:4',
            'descuento' => 'required|between:1,100',
        ];
    }
}
