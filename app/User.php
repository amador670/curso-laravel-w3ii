<?php

namespace App;

use App\Notifications\resetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //De esta forma hacemos que nuestro verificacion de roles sea dinamica. Si el $role es igual al role indicado dara true, si no genera un valor false
    public function hasRoles(array $roles)
    {
        foreach ($roles as $role) {
            if ($this->role === $role) {
                return true;
            }
        }
        return false;
    }

    //Con esta funcion hacemos que las politicas de acceso (policies) sean mas dinamicas, ya que pasamos como metodo la funcion hasRoles() indicando que solo los roles con permiso de usuarios tendras a su vez permisos de politicas de acceso
    public function isAdmin(){
        return $this->hasRoles(["admin"]);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new resetPasswordNotification($token));
    }
}
