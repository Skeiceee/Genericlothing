<?php

namespace genericlothing\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTiendaRequest extends FormRequest
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
          'nom_tienda' => 'required|string|max:30',
          'direccion_tienda' => 'required|string|max:60|unique:tienda,direccion_tienda',
          'ciudad' => 'required',
        ];
    }
}
