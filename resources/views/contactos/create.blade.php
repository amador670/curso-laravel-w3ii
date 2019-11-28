@extends("plantilla") 
@section("contenido")
<h3>Contactos</h3>

<hr><br>

<h4>Sección de prueba</h4>

<p>Editar el documento laravel para poder ver los ejemplos y buscar el <b>Controller:</b> contactosController, para mas información...</p>

<br>
{{-- Formulario de contactos - Deshabilitado por desuso --}}
{{-- <hr><br> 
@if (count($errors) > 0)
<div class="erroresFormulario">
  <ul>
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
  </ul>
</div>
@endif 

<div class="formulario-container contactos-container">
{{ Form::open(array("route" => "contactos.store", "method" => "post", "id" => "formulario")) }}

{{ Form::text('nombre', null, array('placeholder' => 'Ingrese su nombre', 'class' => 'ClaseExtra')) }}

{{ Form::password('clave', array('required' => 'required', 'placeholder' => 'Ingrese su clave')) }}

{{ Form::textarea('comentario', null, array('placeholder' => 'Ingrese un comentario')) }}

{{ Form::select("selectOption", array("No indico valor" => "¿Te gusta nuestro sitio web?", "Bueno sitio" => "Bueno sitio", "Debe Mejorar" => "Debe Mejorar", "Mal sitio web" => "Mal sitio web")) }}

{{ Form::submit('Enviar Datos', array('class' => 'boton-enviar')) }}

{{ Form::close() }}


@if(request()->isMethod("post"))
@foreach($contactos as $contacto)

  <ul class="comments-list">
    <div class="comment-box">

      <div class="comment-head">
        <h6 class="comment-name">{{ $contacto->nombre }}</h6>
        <span>{{$contacto->created_at}}</span>
      </div>

      <div class="comment-email">Opinion del sitio web: {{ $contacto->opinion_del_sitio_web }}</div>

      <div class="comment-content">{{ $contacto->comentario }}</div>
    </div>
  </ul>
  @endforeach 
@endif
</div> --}}
@stop