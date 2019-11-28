@extends("plantilla")

@section("contenido")
<h4>Propiedades de Validacion</h4>

<p>La validación es el aspecto más importante al diseñar una aplicación. Se valida los datos entrantes. Por defecto, la clase controlador de base utiliza un ValidatesRequests rasgo que proporciona un método conveniente para validar las solicitudes HTTP entrantes con una variedad de reglas de validación de gran alcance.</p>

<p>Laravel siempre va a comprobar si hay errores en los datos de la sesión, y automáticamente se unen a la vista si están disponibles. Por lo tanto, es importante tener en cuenta que un <b>$errors variables estarán siempre disponibles en todos sus puntos de vista sobre cada solicitud</b>, lo que le permite asumir convenientemente el $errors variables siempre se define y se puede utilizar con seguridad. Los $errors variables serán una instancia de Illuminate\Support\MessageBag.</p>
<hr>

<h4>Cambiar idioma de validaciones</h4>

<p>Para cambiar el idioma de validacion de nuestras validaciones debemos ir a la carpeta <b>config archivo app</b>, luego en dicho archivo buscamos la propiedad <b>"locale" => "en"</b> y la modificamos por <b>"es"</b> luego descargamos de git o internet el idioma en español (o el que queramos añadir), despues vamos a la carpeta <b>resources/lang</b> y pegamos la carpeta descargada, de esta forma ya apareceran nuestros mensajes de advertencia en el idioma descargado.</p>

<p>Si queremos modificar dichos mensajes y añadirlos de forma personalizadas nos vamos a la carpeta del idioma y modificamos el archivo <b>validation.php</b></p>

<p>
  Link de archivos de validacion en español: 

  <a href="https://github.com/MarcoGomesr/laravel-validation-en-espanol/blob/master/es/validation.php">Link 1</a>, 
  <a href="https://github.com/caouecs/Laravel-lang/blob/master/src/es/validation.php">Link 2</a>, 
  <a href="https://github.com/Laraveles/spanish"> Link 3</a>
</p>

<hr>

<h4>Ejemplo:</h4>

@if (count($errors) > 0)
<div class="erroresFormulario">
    @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif

{{ Form::open(array("route" => "formularios/formulario_recibido", "method" => "post", "id" => "formulario")) }}

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
  "Es Malo" => "Es Malo")
  )
}}
</div>

{{ Form::submit('Enviar Datos', array('class' => 'boton-enviar btn btn-primary mb-5')) }}

{{ Form::close() }}

@stop