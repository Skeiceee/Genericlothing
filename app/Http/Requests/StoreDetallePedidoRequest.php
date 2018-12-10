<?php

namespace genericlothing\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDetallePedidoRequest extends FormRequest
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
            'cod_talla' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'cod_talla.required' => 'Debe ingresar una talla para el producto.',
        ];
    }
}
