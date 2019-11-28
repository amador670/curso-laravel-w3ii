@extends("plantilla")

@section("contenido")
<h4>Middleware</h4>

<h4>Definicion y creacion</h4>

<p>Como el nombre sugiere, middleware actúa como un intermediario entre la petición y la respuesta. Es un tipo de mecanismo de filtrado. Por ejemplo, laravel incluye un middleware que verifica si el usuario de la aplicación se autentica o no. Si el usuario es autenticado, será redirigido a la página principal de lo contrario, será redirigido a la página de inicio de sesión. </p>

<p>Podemos crear un middleware de la siguiente forma: <b>php artisan make:middleware "middleware-name"</b> El middleware que se crea se puede ver en app/Http/Middleware directorio.</p>

<h4>Registrar un Middleware</h4>

<p>Necesitamos registrar todos y cada uno de middleware antes de usarlo. Hay dos tipos de middleware en laravel. <b>Global Middleware</b> y <b>Route Middleware</b></p>

<p>El Global Middleware se ejecutará en cada petición HTTP de la aplicación, mientras que la Route Middleware será asignado a una ruta específica. Los middleware se puede registrar en app/Http/Kernel.php. Este archivo contiene dos propiedades $middleware y $routeMiddleware. $middleware propiedad se utiliza para registrar Global Middleware y $routeMiddleware propiedad se utiliza para registrar el middleware específico para una ruta.</p>

<p>Para registrar un Global Middleware se añade debajo de la clase <b>protected $Middleware</b> y para registrar un Middleware especifico se añade debajo de <b>protected $routeMiddleware</b></p>

<h4>Añadir middleware en el archivo routes/web.php</h4>

<pre>
//Indicamos la ruta
Route::get('iniciar/login',[
   'middleware' => 'nombre_de_la_clase_definida_del_middleware_en_<b>app/Http/Kernel.php</b>',
   'uses' => 'viewController@index',
]);
</pre>

<hr>
<h4>Añadir only (solo) o, except (menos) a un middleware</h4>
<p><b>Este codigo se añade en el controle donde queremos que se aplique el middleware</b></p>

<h4>Only - Solo a un determinado metodo</h4>
<pre>
    //De esta forma llamamos al middleware "auth" que se encuentra dentro del kernel, 
    este nos permite verificar si hay un usuario (user)
    public function __construct()
    {
        $this->middleware("auth");
        //Añadir middleware solo a el metodo "edit y update"
        $this->middleware("role:admin", ["only" => ["edit", "update"]]);
    }
</pre>

<h4>Except - A todos menos a un determinado metodo</h4>
<pre>
    public function __construct()
    {
        $this->middleware("auth");
        //Añadimos el middleware a todos los metodos menos "edit y update"
        $this->middleware("role:admin", ["except" => ["edit", "update"]]);
    }
</pre>



@stop