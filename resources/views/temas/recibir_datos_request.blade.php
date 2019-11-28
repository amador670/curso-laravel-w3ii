@extends("plantilla")
@section("contenido")
<h4>Recibir datos de validacion de un formulario </h4>
<h4>Request()</h4>

<p>De esta forma podemos organizar nuestras validaciones del formulario de forma mas limpia, evitando añadir las validaciones en los controladores</p>

<p>Ejecutamos el comando <b>php artisan make:request nombre del request</b> y de esta forma nos crea un archivo en app> http> request> archivo creado. Aqui es donde añadiremos nuestras validaciones</p>

<h4>Clases del archivo request()</h4>

<p>La funcion <b>authorize()</b> es donde va si el usuario esta autorizado para hacer una determinada accion</p>

<p>La funcion <b>rule()</b> Devuelve un array con los metodos de validacion</p>
@stop