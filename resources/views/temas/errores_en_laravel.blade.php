@extends("plantilla")

@section("contenido")

<h4>Errores de registro y rutas</h4>

<p>Cuando tenemos un proyecto en curso se muestran algunos errores; Estos errores y manejo de excepciones ya está configurado para que cuando se inicia un nuevo proyecto laravel. Normalmente, en un entorno local que necesitamos para ver los errores para fines de depuración. Tenemos que ocultar estos errores de usuarios en el entorno de producción. Esto se puede lograr con la variable <b>APP_DEBUG</b> establecido en el archivo de entorno <b>.env</b> almacenado en la raíz de la aplicación.</p>

<p>Por medio local el valor de APP_DEBUG debe ser true , pero para la producción que se debe establecer a false para ocultar errores.</p>

<p>Note - Después de cambiar el APP_DEBUG variables, reiniciar el servidor laravel.</p>

@stop