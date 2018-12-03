<?php

namespace genericlothing\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExistenciaProductoRequest extends FormRequest
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
          'cod_producto' => 'required',
          'cod_talla' => 'required|string|max:3',
          'cod_tienda' => 'required',
          'direccion_bodega' => 'required',
          'proveedor' => 'required|string|max:30',
          'precio_compra' => 'required|numeric|min: 1',
          'cantidad' => 'required|numeric|min: 1',
      ];
    }
}
