@extends("plantilla")
@section("contenido")

<h4>Subir archivos en Laravel</h4>
<h4>Propiedad File</h4>

<p>Carga de archivos en laravel es muy fácil. Todo lo que tenemos que hacer es crear un archivo de vista donde el usuario puede seleccionar un archivo para ser cargado y un controlador donde se procesarán los archivos cargados.</p>

<p>En Form::open() , tenemos que añadir <b>'files'=>'true'</b> como se muestra a continuación. Esto facilita la forma para ser cargado en múltiples partes.</p>

<p><b>Form::open(array('url' => '/uploadfile','files'=>'true') );</b></p>

<hr>
<h4>Ejemplo:</h4>

@if (count($errors) > 0)
<div class="erroresFormulario">
  <ul>
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
  </ul>
</div>
@endif

{{ Form::open(array("route" => "formularios/formulario_recibido", "method" => "post", "files" => "true")) }}

<div class="form-group">
{{ Form::text('nombre', null, array('placeholder' => 'Ingrese su nombre', 'class' => 'form-control')) }}
</div>

<div class="form-group">
{{ Form::password('clave', array('placeholder' => 'Ingrese su clave', 'class' => 'form-control')) }}
</div>

<div class="form-group">
{{ Form::textarea('comentario', null, array('placeholder' => 'Ingrese un comentario', 'class' => 'form-control')) }}
</div>

<div class="form-group">
{{ Form::select("selectOption", 
array(
  "" => "¿Te gusta nuestro sitio web?", 
  "Es Bueno" => "Es Bueno", 
  "Debe Mejorar" => "Debe Mejorar", 
  "Es Malo" => "Es Malo"
  )
)}}
</div>

<div class="form-group">
{{ Form::file("imagen") }}
</div>

{{ Form::submit('Enviar Datos', array('class' => 'boton-enviar btn btn-primary mb-5')) }}

{{ Form::close() }}

@stop