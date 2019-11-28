<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class mensajeValidacionFormulario extends FormRequest
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
    public function rules(Request $request)
    {
        $validate = [
            'comentario' => 'required|string|min:5|max:1000',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=2000,max_height:2000',

            //Validar imagen. Ejemplo de tema "Subir archivos - Propiedad File en Laravel"
            'imagen' => 'image|mimes:jpg,png,jpeg|dimensions:max_width=2000,max_height:2000',
        ];

        if (!$request->has('password')) {
            $validate["password"] = $this->except("update");
        }

        return $validate;
    }
}
