<?php

namespace genericlothing\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
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
          'nombre' => 'string|max:50',
          'precio_venta' =>'numeric|min: 1',
          'tipo_de_producto' => 'required',
          'marca' => 'required',
          'detalle_producto' => 'string|max:200',
          'foto_producto' =>  'image',
        ];
    }
}
