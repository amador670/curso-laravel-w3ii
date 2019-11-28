@extends("plantilla")

@section("contenido")
<h4>Localizacion - Lenguaje en Laravel</h4>

<p>Url de acceso de ejemplo: <a href="http://curso-laravel-w3ii.dev/localization/en">curso-laravel-w3ii.dev/localization/en</a></p>

<p>La función de la localización de laravel soporta diferentes idioma que se utilizará en la aplicación. Es necesario para almacenar todas las cadenas de diferente idioma en diferentes archivo y estos archivos se almacenan en resources/views/lang, directorio. Debe crear un directorio independiente para cada lenguaje soportado. Todos los archivos de idioma deben devolver una matriz de cadenas con llave como se muestra a continuación. </p>

<pre>
return [
   'mensaje' => 'Welcome to the application'
];
</pre>

@stop