@extends("plantilla")
@section("contenido")

<h4>Formularios html en Laravel</h4>

<p><b>Nota: </b>En formularios de HTML añadimos value="<b>old</b>("nombre del campo")" y al enviar nuestro formulario y haya un error no se recargaran los campos ingresados</p>

<p>Laravel ofrece diversas en las etiquetas construidas para manejar formularios HTML con facilidad y seguridad. Todos los principales elementos de HTML se generan utilizando laravel. Para apoyar esto, tenemos que añadir el paquete HTML para laravel usando compositor. </p>

<p>Comando en php <b>composer require illuminate/html</b></p>

<p>Luego de ejecutar el comando tenemos que añadir dicho paquete en el fichero de configuracion <b>config/app</b> luego de abrir dicho archivo se observa una lista de proveedores de servicios de laravel, debemos añadir el proveedor de servicios de HTML, ejemplo:</p>

<pre>
'providers' => [
  Illuminate\Html\HtmlServiceProvider::class,
]
</pre>

<p>Añadir alias en el mismo archivo de HTML y forma</p>

<pre>
'aliases' => [
  'Form' => Illuminate\Html\FormFacade::class,
  'Html' => Illuminate\Html\HtmlFacade::class,
]
</pre>

<p>De esta forma ya abremos activado la apertura de formularios de html con Laravel</p>

<hr>
<h4>En caso de error</h4>

<p>Si aparece el error <b>Call to undefined method Illuminate\Foundation\Application::bindShared()</b> al haber ejecutado <b>composer require illuminate/html</b> se hace lo siguiente:</p>

<p>1.- Se usara el package <b>laravelcollective/html</b></p>

<p>2.- Seguimos a la consola CMD de nuestro proyecto y removemos illuminate/html - <b>composer remove illuminate/html</b></p>

<p>3.- Despues añadimos <b>composer require laravelcollective/html</b></p>

<p>4.- Despues de que se haya instalado nos vamos a  <b>config/app</b> y cambiamos las rutas de las propiedades añadidas por <b>Collective\Html\</b> ejemplo:</p>

<br>
<pre>
'<b>provider</b>' => Collective\Html\HtmlServiceProvider::class,

'<b>aliases</b>' => 
'Form' => Collective\Html\FormFacade::class, 
'Html' => Collective\Html\HtmlFacade::class,
</pre>

<p>Informacion sacada de: <a href="https://laracasts.com/discuss/channels/laravel/call-to-undefined-method-illuminatefoundationapplicationbindshared?page=1">Aquí...</a></p>

<hr>
<h4>Etiquetas del formulario</h4>

<p>Apertura del formulario:</p>

<pre>
 //Se añaden dos corchetes al principio y el final
{ Form::open(array('url' => 'foo/bar')) }
   //Codigo del formulario
{ Form::close() }
</pre>

<p>Generación de un elemento LABEL</p>

<pre>echo Form::label('email', 'E-Mail Address');</pre>

<p>La generación de una entrada de texto</p>

<pre>echo Form::text('username');</pre>

<p>Especificación de un valor predeterminado</p>

<pre>echo Form::text('email', 'example@gmail.com') ;</pre>

<p>Generación de una contraseña de entrada</p>

<pre>echo Form::password('password', 'Password');</pre>

<p>Generación de un archivo de entrada</p>

<pre>echo Form::file('image');</pre>

<p>Generación de una casilla de verificación o de entrada Radio</p>

<pre>
echo Form::checkbox('name', 'value');
echo Form::radio('name', 'value');
</pre>

<p>Generación de una casilla de verificación o de entrada de radio que se comprueba</p>

<pre>
echo Form::checkbox('name', 'value', true);
echo Form::radio('name', 'value', true);
</pre>

<p>La generación de una lista desplegable</p>

<pre>echo Form::select('size', array('L' => 'Large', 'S' => 'Small') );</pre>

<p>Generar un botón de envío</p>

<pre>echo Form::submit('Click Me!');</pre>
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
{{ Form::password('clave', array('required' => 'required', 'placeholder' => 'Ingrese su clave', 'class' => 'form-control')) }}
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

{{ Form::submit('Enviar Datos', array('class' => 'boton-enviar btn btn-primary')) }}

{{ Form::close() }}

@stop