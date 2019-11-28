<?php

namespace App\Policies;

use App\mensajeEnloquent;
use Illuminate\Auth\Access\HandlesAuthorization;

class mensajePolicy
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

}
