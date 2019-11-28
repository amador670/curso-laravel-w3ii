@extends("plantilla")

{{-- Estilos CSS --}}
@section("estilos-css")

{{-- Estilos mensajes y usuarios --}}
<link rel="stylesheet" href="/css/mensajes-usuarios-estilos/mensajes-usuarios-estilos.css">

{{-- Input File Imagen Area Select --}}
<link rel="stylesheet" href="/css/jcrop/imgareaselect.css" />
@stop

{{-- Contenido --}}
@section("contenido")

<h4>Editar mensaje</h4>

@if (count($errors) > 0)
<div class="erroresFormulario">
  @foreach ($errors->all() as $error)
  <div>{{ $error }}</div>
  @endforeach
</div>
@endif

<div class="mensajes-container">
{{ Form::open(array("route" => ["mensajes.update", $mensaje->id], "method" => "post", "id" => "formulario")) }}

{{method_field("PUT")}}

<div class="form-group">
<label for="comentario">Comentario:</label>
{{ Form::textarea('comentario', $mensaje->comment, array('placeholder' => 'Ingrese un comentario', "class" => "form-control", "id" => "comentario")) }}
</div>

<div class="select-property mb-3">
  <select class="form-control" name="selectOption">        
    @foreach($items as $key => $item)
      <option value="{{ $key }}" 
        @if($mensaje->valoration_for_website === $key) selected='selected' @endif> {{ $item }}
      </option>
    @endforeach
  </select>
</div>

<span class="btn-sm">Publicado:</span>
<p class="btn-sm">{{ $mensaje->created_at}}</p>

<span class="btn-sm">Editado:</span>
<p class="btn-sm">{{ $mensaje->updated_at}}</p>


{{ Form::submit('Guardar Datos', array('class' => 'btn btn-primary boton-enviar ml-1')) }}

{{ Form::close() }}

<form method="post" action="{{ route('mensajes.destroy', $mensaje->id )}}" style="display: inline;">
  {{csrf_field()}}  
  {{method_field("delete")}}
  <button type="submit" class="btn btn-danger">Eliminar Mensaje</button>
</form>

<br><br>

</div>
@stop