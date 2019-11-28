@extends("plantilla")


@section("contenido")
<h4>Los datos ingresados fueron:</h4>

<div><b>Usuario</b></div>
<p>{{ $nombre }}</p>

<div><b>Comentario:</b></div>
<p>{{ $comentario }}</p>

<div><b>Opinion de la pagina web:</b></div>
<p>{{ $selectOption }}</p>

<div><b>Imagen cargada:</b></div>

@if(!empty($_FILES['imagen']['name']))

<p>Archivo - Propiedad File: {{ $file }}</p>
<p>Nombre del archivo: {{ $fileName }}</p>
<p>Extension del archivo: {{ $fileExtension }}</p>
<p>Nombre real de la direccion del archivo: {{ $fileRealPath }}</p>
<p>Tamaño del archivo: {{ $fileSize }}</p>
<p>Tipo de archivo: {{ $fileMimeType }}</p>
<p>Mover archivo a la carpeta: {{ $fileMove }}</p>

<img src='{{ request()->root() . "/" . $fileMove}}' alt="Imagen Dragon Ball Super">
@else

<img src='{{ request()->cookie("cookieImagen") }}' alt="Imagen Dragon Ball Super">
@endif

@stop