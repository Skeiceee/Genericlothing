<?php

namespace genericlothing\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfiguracionUserRequest extends FormRequest
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
           'nom_cliente' => 'required|string|max:50',
           'apellido_paterno' => 'required|string|max:20',
           'apellido_materno' => 'required|string|max:20',
           'telefono' => 'required|numeric',
           'ciudad' => 'required',
       ];
     }
}
