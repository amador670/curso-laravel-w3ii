@extends("plantilla")

@section("contenido")
<h4>Enrutamiento - Rutas</h4>

<h4>Enrutamiento Basico</h4>

<p>Está destinado a dirigir su solicitud a un controlador adecuado. Las rutas de la aplicación se pueden definir en route/web.php. Ésta es la sintaxis general para cada ruta de la posible solicitud. </p>

<p><b>Ejemplo:</b></p>

<pre>
//La ruta principal ejecuta una funcion que dara un mensaje princpal de "Hello World"
<b>Route::get</b>('/', function () {
   return 'Hello World';
});

//Al acceder al metodo "post" de "contactos/mensajes" nos enviara un mensaje de agradecimiento por el metodo post
<b>Route::post</b>('contactos/mensaje', function () {
   return 'Gracias por contactanos y envianos un mensaje';
});

<b>Route::put</b>('contactos/mensaje', function () {
   //
});

<b>Route::delete</b>('contactos/mensaje', function () {
   //
});
</pre>

<br>
<h4>Rutas con parametros requeridos y opcionales</h4>

<p><b>Parametros requeridos</b></p>
<pre>
    route::get("saludos/{usuario}", function($usuario){
        return "Saludos $usuario";
    })
</pre>

<p><b>Parametros opcionales</b></p>
<pre>
     route::get("saludos/{usuario?}", function($usuario = "Invitado"){
        return "Saludos $usuario";
    })
</pre>

<p><b>Parametros solo alfabeticos</b></p>
<pre>
     route::get("saludos/{usuario?}", function($usuario = "Invitado"){
        return "Saludos $usuario";
    })->where("usuario", "[a-zA-Z]+");
</pre>
@stop