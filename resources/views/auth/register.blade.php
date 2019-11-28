@extends("plantilla") 
@section("contenido")

<div class="row align-items-center justify-content-between mt-4">
    <div class="col-12">
        <h4>Registrarse</h4>

        @if (count($errors) > 0)
        <div class="erroresFormulario">
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
        </div>
        @endif


{{ Form::open(array("route" => "register", "method" => "post", "id" => "formulario")) }}

<div class="form-group">
{{ Form::text('name', null, array('placeholder' => 'Ingrese su nombre', "class" => "form-control")) }}
</div>

<div class="form-group">
{{ Form::email('email', null, array('placeholder' => 'Ingrese su correo', "class" => "form-control")) }}
</div>

<div class="form-group">
{{ Form::password('password', array('placeholder' => 'Ingrese su clave', "class" => "form-control")) }}
</div>

<div class="form-group">
{{ Form::password('password_confirmation', array('placeholder' => 'Confirme su clave', "class" => "form-control")) }}
</div>


{{ Form::submit('Enviar Datos', array('class' => 'btn btn-primary boton-enviar ml-1')) }}     
{{ Form::close() }}
     
{{-- Boton LOGIN --}}
{{ Form::open(array("route" => "login", "method" => "get"))}}    
{{ Form::submit('Iniciar Sesión', array('class' => 'btn btn-primary boton-enviar ml-1')) }}
{{ Form::close() }}

    </div>
</div>

@stop