@extends("plantilla") 
@section("contenido")
<h4>Roles de usuario en Laravel</h4>

<div class="li-space">
    <p>La creacion de <b>roles</b> en laravel nos permite manejar que usuarios tendran permisos para crear contenido, ver secciones,
        y encargarse de diferentes partes del sitio web, en este caso cada usuario tendra un rol diferente. A continuacion
        un ejemplo de como crear roles en laravel</p>

    <ol>
        <li>Se añade en "routes > web.php": <b>Route::resource("usuarios", "userController");</b></li>

        <li>El controlador viene por defecto en laravel, si no aparece lo creamos manualmente, <b>php artisan make:controller userController -resource</b>            debe ser un controlador CRUD que permite crear, leer, actualizar y eliminar</li>

        <li>Creamos un middleware <b>php artisan make:middleware verificarRoleUsuario</b> que se encargara de dejarnos continuar
            siempre y cuando el usuario tenga el role indicado, se añade el siguiente codigo</li>

        <pre>
    public function handle($request, Closure $next)
    {
        //Esta funcion permite devolver un array con todos los parametros de la funcion o metodo en el que estamos
        $roles = func_get_args();

        //Esta funcion permite sacar parametros de un array, en este caso los dos primeros de "func_get_args()"
        $roles = array_slice($roles, 2);

        //Si hay un usuario autenticado que tenga un $role lo dejamos continuar
        if (auth()->user()->hasRoles($roles)) {
            return $next($request);
        }
    }
    </pre>

        <li>Registramos en el kernel, en la variable "$routeMiddleware = [ ]" nuestro middleware creado, <b>"role" => \App\Http\Middleware\verificarRoleUsuario::class,</b></li>

        <li>Añadimos en nuestro <b>userController</b> una funcion constructora con nuestro middleware auth y el middleware role</li>

        <pre>
    //De esta forma llamamos al middleware "auth" que se encuentra dentro del kernel, 
    este nos permite verificar si hay un usuario (user)
    public function __construct()
    {
        //Para pasar parametros a los middleware añadimos : y luego el parametro
        $this->middleware([
            "auth", "role:Admin,Moderador"
            ]);
    }
    </pre>

        <p>En la <b>funcion index()</b> del controlador mostramos todos los usuarios de la base de datos "users"</p>
        <pre>   
        $users = \App\User::all();
        return view("usuarios.index", compact("users"));
    </pre>

        <li>Creamos un modelo con <b>php artisan make:model user</b>, aunque este viene por defecto en laravel. Aca añadimos
            la funcion hasRoles() para permitir de forma dinamica cambiar el permiso a cada role, creamos una funcion</li>

        <pre>
    //De esta forma hacemos que nuestro verificacion de roles sea dinamica. Si el $role 
    es igual al role indicado dara true, si no genera un valor false 
    public function hasRoles(array $roles)
    {
        foreach ($roles as $role) {
            if ($this->role === $role) {
                return true;
            }
        }
        return false;
    }
    </pre>

        <li>En este caso añadimos en el archivo <b>plantilla.blade.php</b> la funcion auth seguida del role para indicar que
            pestaña/seccion queremos mostrar al administrador, moderador, usuario, etc. Ejemplo</li>
        <pre>
        if(auth()->user()->hasRoles(["Admin", "Moderador"]))
        &lt;li&gt;
            <a class="" href="#">Usuarios</a>
        &lt;/li&gt;
        endif
    </pre>

        <li>Para finalizar añadimos en nuestra carpeta <b>usuarios > index.blade.php</b> el resultado que queremos mostrar, en
            este ejemplo mediante un ciclo foreach mostramos los usuarios registrados</li>

        <pre>
        foreach($users as $user)

        endoforeach
    </pre>

        <h2>Archivos utilizados para la creacion de roles:</h2>
        <ol>
            <li>routes > web.php - Route::resource("usuarios", "userController");</li>
            <li>Controlador: userController</li>
            <li>Middleware verificarRoleUsuario</li>
            <li>App\Http > Kernel - registro de nuestro middleware verificarRoleUsuario</li>
            <li>Model (Modelo) - User.php</li>
            <li>Plantilla.blade.php - Con la verificacion auth->role indicando que pestaña queremos mostrar a cada usuario</li>
            <li>Resources\views > usuarios > index.blade.php - Con el archivo que queremos mostrar generado para los roles</li>
        </ol>

    </ol>
</div>



@stop