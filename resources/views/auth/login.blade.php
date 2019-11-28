@extends("plantilla")
@section("contenido")

<div class="row align-items-center justify-content-between mt-4">
    <div class="col-12">
        <h4>Iniciar de Sesión</h4>

        @if (count($errors) > 0)
        <div class="erroresFormulario">
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
        </div>
        @endif


{{ Form::open(array("route" => "login", "method" => "post", "id" => "formulario")) }}

<div class="form-group">
{{ Form::email('email', null, array('placeholder' => 'Ingrese su correo', "class" => "form-control")) }}
</div>

<div class="form-group">
{{ Form::password('password', array('placeholder' => 'Ingrese su clave', "class" => "form-control")) }}
</div>


{{ Form::submit('Enviar Datos', array('class' => 'btn btn-primary boton-enviar ml-1')) }}     
{{ Form::close() }}
     
{{ Form::open(array("route" => "register", "method" => "get"))}}    
{{ Form::submit('Registrarse', array('class' => 'btn btn-primary boton-enviar ml-1')) }}
{{ Form::close() }}

{{ Form::open(array("route" => "cambiarClave", "method" => "get"))}} 
{{ Form::submit('Cambiar Clave', array('class' => 'btn btn-primary boton-enviar')) }} 
{{ Form::close() }}


    </div>
</div>
@stop