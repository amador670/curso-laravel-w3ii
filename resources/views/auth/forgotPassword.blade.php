@extends("plantilla")
@section("contenido")

<div class="row align-items-center justify-content-between mt-4">
    <div class="col-12">
        <h4>Cambiar Clave</h4>

        @if (count($errors) > 0)
        <div class="erroresFormulario">
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
        </div>
        @endif

{{ Form::open(array("route" => "cambiarClave", "method" => "post", "id" => "formulario")) }}

<div class="form-group">
{{ Form::email('email', null, array('placeholder' => 'Ingrese su correo', "class" => "form-control")) }}
</div>

@if(session()->has("cambiarClave")) 
    <p class="text-primary p-2" style="border: 1px solid #007bff; border-radius: 6px; background: #effcff;">
        {{ session("cambiarClave") }}
    </p>
@endif

{{ Form::submit('Enviar Datos', array('class' => 'btn btn-primary')) }}     
{{ Form::close() }} 
</div>
</div>

@stop