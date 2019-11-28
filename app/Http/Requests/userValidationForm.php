<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class userValidationForm extends FormRequest
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
            /* Verificar que el campo email sea unico en la table users columna "email" - unique:users,email */

            /* Para verificar que el correo sea diferente al que ya esta usando el usuario añadimos $this->route("usuario") en route añadimos el nombre del parametro al hacer update */

            'name' => 'required|string|min:4|max:35',
            'email' => 'required|email|min:5|max:100|unique:users,email,' . $this->route("usuario"),
            'password' => 'required|string|min:5|max:10|confirmed',
            'role' => 'required',
        ];

        if (!$request->has('password')) {
            $validate["password"] = $this->except("update");
        }

        if (!$request->has('role')) {
            $validate["role"] = $this->except("update");
        }

        return $validate;
    }

}
