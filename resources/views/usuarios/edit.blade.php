@extends("plantilla")

{{-- Estilos CSS --}}
@section("estilos-css")

{{-- Estilos mensajes y usuarios --}}
<link rel="stylesheet" href="/css/mensajes-usuarios-estilos/mensajes-usuarios-estilos.css">
@stop

{{-- Contenido --}}
@section("contenido")
<h4 class="mb-5">Editar mensaje</h4>

<h5 class="text-success">
  @if(session()->has("info"))
  {{ session("info") }}
  @endif
</h5>

@if (count($errors) > 0)
<div class="erroresFormulario">
    @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif 

<?php  
      //Creamos una funcion para seleccionar las secciones del menu activas
			function selectChecked($user, $role){
			return $user->role == $role ? true : false;
			}
?>

<div class="formulario-container mensajes-container">
{{ Form::open(array("route" => ["usuarios.update", $user->id], "method" => "post", "id" => "formulario")) }}

{{method_field("PUT")}}

<div class="form-group">
{{ Form::text('name', $user->name, array('placeholder' => 'Ingrese su nombre', 'class' => 'form-control')) }}
</div>

<div class="form-group">
{{ Form::email('email', $user->email, array('placeholder' => 'Ingrese su correo', 'class' => 'form-control')) }}
</div>

@if(auth()->user()->hasRoles(["admin"]))
<div class="radio">
{{ Form::radio('role', 'admin', $user->role == 'admin' ? true : false, array("id" => "admin")) }} 
{{ Form::label('admin', "Administrador") }}

{{ Form::radio('role', 'moderador', $user->role == 'moderador' ? true : false, array("id" => "moderador")) }} 
{{ Form::label('moderador', "Moderador") }}

{{ Form::radio('role', 'usuario', selectChecked($user, "usuario"), array("id" => "usuario")) }} 
{{ Form::label('usuario', "Usuario") }}
</div> 
@endif

{{ Form::submit('Enviar Datos', array('class' => 'boton-enviar btn btn-primary')) }}

{{ Form::close() }}

<br>
<br>
</div>
@stop