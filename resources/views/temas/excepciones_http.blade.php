@extends("plantilla") 
@section("contenido")
<h4>Excepciones HTTP</h4>

<p>Algunas excepciones describen los códigos de error HTTP como 404, 500, etc. Para generar dicha respuesta en cualquier lugar de una aplicación, puede utilizar abort() método de la siguiente manera.</p>

<p><b>abort(404)</b></p>

<p><a href="{{ route('error404') }}">Ir a error 404</a></p>

@stop