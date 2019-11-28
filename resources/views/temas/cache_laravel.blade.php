@extends("plantilla")
@section("contenido")

<h4>Cache en laravel - Files y redis</h4>

<p>En la informatica el cache, es una memoria de acceso rapido donde se almacena el caché de un procesador, es un tipo
    de memoria volátil (como la memoria RAM), pero muy rápida. Su función es almacenar instrucciones y datos a los que
    el procesador debe acceder continuamente, almacenar datos en la memoria o bases de datos, normalmente de consultar
    complejas solicitadas a la base de datos para poder reutilizar los datos posteriormente.</p>


<h4>Aplicacion procesando una consulta sin cache</h4>
<p>Aplicacion > consulta SQL > repuesta de la consulta > retorna la aplicacion</p>

<h4>Aplicacion procesando una consulta usando cache</h4>
<p>Aplicacion > consulta SQL > Verficicar si existen datos en el caché > Si no existe ejecuta el procesamiento SQL >
    repuesta de la consulta SQL > crea el caché > resultado SQL almacenado en el caché > retorna la aplicacion. </p>

<p><b>Si existe el cache solo hace lo siguiente.</b></p>

<p>Aplicacion > consulta SQL > Verficicar si existen datos en el caché > Si existe ejecuta el caché directamente >
    resultado SQL almacenado en el caché > retorna la aplicacion.</p>

<hr>
<h4>Propiedades de cache</h4>

<p><b>Importar la clase.</b> use Illuminate\Support\Facades\Cache;</p>

<p>
    <b>cache::put</b>('key o llave', valor del cache, tiempo en minutos) - propiedad para almacenar y crear datos de
    cache
</p>

<p>
    <b>cache::get</b>(key) - obtener valor de un cache, en este caso el cache con el nombre de key
</p>

<p>
    <b>cache::has</b>(key) - metodo para preguntar si existe una llave en el cache con ese nombre
</p>

<p>
    <b>cache::forget</b>(key) - quitar manualmente una llave del cache
</p>

<p>
    <b>cache::flush()</b> - quita absolutamente todas las llaves o keys almacenadas del cache en el sitio web
</p>

<hr>
<h4>Redis - Cache en laravel </h4>

<p><a href="https://laravel.com/docs/5.8/redis">Redis en laravel</a></p>

<p>
    <a href="https://redis.io/">Pagina web oficial de redis</a>
</p>

<p>Manejador de base de datos, cache e intermediario de mensajes de codigo abierto, es referido como base de datos
    NoSQL, este permite eliminar datos especificos del cache, y que no se eliminen todos los datos del cache al usar
    <b>cache::flush()</b></p>

<p><b>Implementar redis</b></p>

<ol>
    <li>
        Descargar redis e instalar el Windows Setup, a la fecha de este blog se encuentran versiones entre
        <a href="https://github.com/rgl/redis/downloads">2.2.0 - 2.4.6</a> y <a
            href="https://github.com/microsoftarchive/redis/releases">3.2.1</a> en Github o <a
            href="http://cygwin.mirror.constant.com/">Cygwin</a>, ya que las versiones recientes estan solo para Linux y
        Mac
    </li>

    <li>
        Ir al archivo .env de variables de entorno y cambiar el valor de "CACHE_DRIVER=file" por
        "<b>CACHE_DRIVER=redis</b>"
    </li>

    <li>Implementar la libreria php <b>predis/predis</b> vamos a la consola CMD de nuestro proyecto y escribimos composer require predis/predis </li>

    <li>Borrar el cache de nuestro proyecto con <b>php artisan config:cache</b>, en dado caso tambien eliminar el de
        nuestro navegador
    </li>

    <li>Ejecutar en la consola CMD de windows <b>redis-server.exe</b> para ejecutar el servidor y <b>redis-cli.exe</b>
        en otra consola para conectarse a este servidor a través del shell, ya que este manejador de cache y base de
        datos funciona con un servidor distinto al de MySQL
    </li>

    <li>Escribir en la consola de "redis-cli.exe" la palabra <b>PONG</b> y dara como resultado <b>"OK"</b></li>

    <li>Listo! ya esta disponible para usarlo en nuestro proyecto</li>

</ol>

<h4><a href="http://programandonet.com/questions/336/como-ejecuto-redis-en-windows.html">Foro de ayuda para redis en
        windows </a></h4>

<h4>Propiedades de Redis</h4>

<p><b>keys * </b> Ver o determinar todas las llaves almacenadas en el cache</p>

<p>En <b>tags('')</b> añadimos el nombre de nuestro cache, es recomendable añadir el mismo del <b>Key o valor</b> del cache</p>

<p>
    <b>cache::tags('nombre del cache')->put</b>('key o llave', valor del cache, tiempo en minutos) - propiedad para almacenar y crear datos de
    cache
</p>

<p>
    <b>cache::tags('key')->get</b>(key) - obtener valor de un cache, en este caso el cache con el nombre de key
</p>

<p>
    <b>cache::tags('nombre del cache')->has</b>(key) - metodo para preguntar si existe una llave en el cache con ese nombre
</p>

<p>
    <b>cache::tags('nombre del cache')->forget</b>(key) - quitar manualmente una llave del cache
</p>

<p>
    <b>cache::tags('nombre del cache')->flush()</b> - quita absolutamente todas las llaves o keys almacenadas del cache en el sitio web
</p>

<hr>

<h4 class="text-primary">Formas de implemetar el cache</h4>
<pre>

    //Permitir que se guarde en el cache cada pestaña de la paginacion (page 1, 2, 3, etc)
    //Definimos una variable, con la url + request (resultado) de la paginacion (page)
    $key = "mensajes/create.page." . request('page', 1);


    //cache con redis
    if (Cache::tags("mensajes")->has($key)) {
    $mensajes = Cache::tags("mensajes")->get($key);
    
    } else {
    $mensajes = mensajeEnloquent::orderBy('id', 'desc')->paginate(5);
    
    Cache::tags("mensajes")->put($key, $mensajes, "60");
    }
    
    return view("mensajes.create", compact("mensajes"));
</pre>

<p><b>Y en el metodo update y destroy</b></p>

<pre>
    //Para borrar el cache
    Cache::tags("mensajes")->flush();
</pre>

@stop