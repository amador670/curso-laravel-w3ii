@extends("plantilla") 
@section("contenido")
<h4>Autorizacion de Roles - Policies</h4>

<p>
    Las autorizaciones de roles nos permiten controlar de forma especifica que usuario puede acceder a determinada url, ademas
    permiten controlar cual usuario puede editar, modificar y eliminar de forma especifica entre otras funciones referentes
    a la autorizacion de cada usuario.

</p>

<h4>1era forma</h4>

<p> 1.- Creamos <b>php artisan make:policy</b> nombre_del_archivo_policy</p>

<p>
    2.- Registramos y añadimos las clases en <b>App > Providers > AuthServiceProvider</b>
</p>

<pre>
    use App\User;
    use App\Policies\UserPolicy;
    <b>use Illuminate\Support\Facades\Gate;</b>
</pre>

<p>
    3.- En el mismo archivo añadimos en el array protected
</p>

<pre>
    protected $policies = [
        
    //El modelo registerUserModel estara asociado a la politica de acceso "UserPolicy"
    registerUserModel::class => UserPolicy::class,

    ];
</pre>

<p>
    4.- Añadimos en la <b>"function boot()"</b> del mismo archivo <b>AuthServiceProvider</b> el siguiente codigo:
</p>

<pre>
    public function boot()
    {
        $this->registerPolicies();

        //En difene('') añadimos el nombre que tendra nuestra autorizacion
        //$user variable es asumida automaticamente por la propiedad "Gate" y es el usuario registrado actual
        Gate::define('mensajePolicy', function ($user, $post) {
            return $user->id == $post->id_user_message;
        });
    }
</pre>

<p>
    5.- En UserPolicy añadimos las siguientes clases
</p>

<pre>
    namespace App\Policies;
    use App\User;
    use Illuminate\Auth\Access\HandlesAuthorization;
</pre>

<p>
    6.- Por ultimo añadimos en el metodo de nuestro controller la funcion que permitira aplicar las politicas de autorizacion, ejemplo:
</p>

<pre>
        $mensaje = mensajeEnloquent::findOrFail($id);

        if (Gate::allows('mensajePolicy', $mensaje)) {
            return view("mensajes.edit", compact("mensaje", "items"));
        } else {
            return abort(404);
        }

        exit;
</pre>

<hr>
<h4>2da forma</h4>

<p> 1.- Creamos <b>php artisan make:policy</b> nombre_del_archivo_policy</p>

<p>
    2.- Registramos y añadimos las clases en <b>App > Providers > AuthServiceProvider</b>
</p>

<pre>
    use App\User;
    use App\Policies\UserPolicy;
    </pre>

<p>
    3.- En el mismo archivo añadimos en el array protected
</p>

<pre>
        protected $policies = [

        //El modelo registerUserModel estara asociado a la politica de acceso "UserPolicy"
        registerUserModel::class => UserPolicy::class,

    ];
    </pre>

<p>
    4.- En UserPolicy añadimos las siguientes clases
</p>

<pre>
    namespace App\Policies;
    use App\User;
    use Illuminate\Auth\Access\HandlesAuthorization;
</pre>

<p>5.- Luego añadimos en el mismo archivo <b>UserPolicy</b> debajo de la funcion __construct() el siguiente codigo </p>

<pre>
    //Si este metodo devuelve verdadero ninguno de los que siguen se ejecutaran 
    //Esto funciona para verificar si es "administrador" o no, y dar todos los permisos para editar y actualizar los datos

    public function before($user, $ability){
        if ($user->hasRoles(["admin"])) {
            return true;
        }
    }

    public function edit(registerUserModel $authUser, registerUserModel $user){
        return $authUser->id === $user->id;
    }

    public function update($authUser, $user){
        return $authUser->id === $user->id;
    }
    </pre>

<p>6.- Añadimos el siguiente codigo en el metodo <b>UserController</b> cada vez que queremos añadir la autenticacion</p>

<pre>
        //Verificamos el usuario mediante la userPolicy
        $this->authorize($user);
    </pre> 
@stop