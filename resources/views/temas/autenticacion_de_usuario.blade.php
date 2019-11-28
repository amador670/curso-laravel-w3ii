@extends("plantilla") 
@section("contenido")
<h4>Autenticacion de usuario - Aunt()</h4>

<p>El registro y login que viene incluido en Laravel nos permite de forma simple genera las vistas, rutas y controladores correspondientes
    pero que nos da la facilidad de personalizarlo completamente.</p>

<p>Comando: <b>php artisan make:auth</b></p>

<p>
    Laravel permite crear una protección de autenticación muy sólido en el núcleo que hace que la implementación de la autenticación básica sea muy sencilla. De hecho, solo necesitas ejecutar un par de comandos artisan para configurar el sistema de autenticación.
</p>

<p>El auth controller esta dividido en dos archivos <b>LoginController</b> y <b>RegisterController.</b></p>

<p>Rutas que se añaden en routes>web.php</p>
<pre>
//Register
    Route::get('auth/register', ["as" => "register", "uses" => "Auth\RegisterController@showRegistrationForm"]);

    Route::post('auth/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@register']);

//Login
    route::get("auth/login", ["as" => "login", "uses" => "Auth\LoginController@showLoginForm"]);
    route::post("auth/login", ["as" => "login", "uses" => "Auth\LoginController@login"]);
    route::get("logout", ["as" => "logout", "uses" => "Auth\LoginController@logout"]);

</pre>

<h2>Propiedades de auth:</h2>

<p><b>auth()->user()->email / name </b> Devuelve un objeto usuario, en este caso el nombre del usuario autenticado.</p>
<p><b>auth()->check()</b> Devuelve verdadero si hay un usuario autenticado actualmente</p>
<p><b>auth()->guest()</b> Devuelve un valor booleano de verdadero o falso</p>

<h2>Evitar acceder a una ruta que no ha sido autenticada</h2>

<p>//De esta forma llamamos al middleware "auth" que se encuentra dentro del kernel, este nos permite verificar si hay un usuario
(user), esto se añade en el controlador de nuestro login (en mi caso mensajesController)</p>

<p><b>Esto tambien se añade para</b> evitar que el usuario acceda a cierta url si no esta logeado, se añade en el controlador que queremos que funcione si el usuario inicio sesion</p>
<br>

<pre>
    public function __construct()
    {
        $this->middleware("auth");
    }
</pre>

<p><b>Para añadir solo a los metodos que queremos que se aplique: </b> $this->middleware("auth", ["only" => ["create"]]);</p>

<p><b>Para añadir solo a los metodos que no queremos que se aplique: </b> $this->middleware("auth", ["except" => ["create", "store"]]);</p>

<h2>Mostrar url a cierto role</h2>

<p>En este caso permitir que solo el <b>administrador</b> pueda ver los usuarios registrados</p>

<br>
<pre>
    if(auth()->user()->role === "admin")
        //Accion que queremos que ejecute....
    endif
</pre>


@stop