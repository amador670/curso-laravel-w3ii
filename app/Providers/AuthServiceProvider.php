<?php

namespace App\Providers;

/* User policies */
use App\mensajeEnloquent;
use App\Policies\mensajePolicy;

/* Mensaje policies */
use App\Policies\UserPolicy;
use App\registerUserModel;

/*  */
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

        //El modelo registerUserModel estara asociado a la politica de acceso "UserPolicy"
        registerUserModel::class => UserPolicy::class,

        //El modelo mensajeEnloquent estara asociado a la politica de acceso "UserPolicy"
        mensajeEnloquent::class => mensajePolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */

    public function boot()
    {
        $this->registerPolicies();

        //En difene('') añadimos el nombre que tendra nuestra autorizacion
        //$user variable es asumida automaticamente por la propiedad "Gate" y es el usuario registrado actual
        Gate::define('mensajePolicy', function ($user, $post) {
            return $user->id == $post->id_user_message;
        });
    }
}
