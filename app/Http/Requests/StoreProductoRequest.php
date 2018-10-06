<?php

namespace genericlothing\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
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
            'nombre' => 'required|string|max:50',
            'precio_venta' =>'required|numeric|min: 1',
            'tipo_de_producto' => 'required',
            'marca' => 'required',
            'detalle_producto' => 'required|string|max:200',
            'foto_producto' =>  'required|image',
        ];
    }
}
