@extends("plantilla") 
@section("contenido")
<h4>Solicitud - Metodo Path</h4>

  <h4>Ejemplos:</h4>

    <p>Metodo Path: <b>{{ request()->path() }}</b></p>
    <p>Metodo URL: <b>{{ request()->url() }}</b></p>
    <p>Metodo URI: <b>{{ request()->is("solicitud_metodo_path") }}</b></p>
    <p>Metodo Root: <b>{{ request()->root() }} </b></p>
    <p>Metodo Segment: <b>{{ request()->segment(1) }}</b></p>

    <hr>

    <h4 class="mb-3">En este ejemplo se usa el formularioController.php</h4>

      <h5>Ingresar datos</h5>
        <div class="">
          <form method="post" action="{{ route("envio/formulario") }}">
            {!! csrf_field() !!}

            <div class="form-group">
              <input type="text" name="usuario" placeholder="Nombre" class="form-control">
            </div>

            <div class="form-group">
              <input type="password" name="password" placeholder="Clave" class="form-control">
            </div>

            <input type="submit" value="Iniciar Sesion" class="boton-enviar btn btn-primary">
          </form>
        </div>

        @if(request()->isMethod('post'))

        <h4 class="text-success">Datos Recibidos</h4>
          <h5 class="text-info">Nombre: {{ $usuario }}</h5>
          <h5 class="text-info">Clave: {{ $password }}</h5>

          <div class="mb-5"><span></span></div>
          @endif 
@stop