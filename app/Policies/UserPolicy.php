<?php

namespace App\Policies;

use App\registerUserModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //Si este metodo devuelve verdadero ninguno de los que siguen se ejecutaran
    //Esto funciona para verificar si es "administrador" o no, y dar todos los permisos para editar y actualizar los datos
    public function before($user, $ability)
    {
        if ($user->isAdmin(["admin"])) {
            return true;
        }
    }

    /*** Policies/Authorize de controller UserController***/
    //authUser: Es el usuario autenticado
    public function edit(registerUserModel $authUser, registerUserModel $user)
    {
        return $authUser->id === $user->id;
    }

    public function update($authUser, $user)
    {
        return $authUser->id === $user->id;
    }
}
