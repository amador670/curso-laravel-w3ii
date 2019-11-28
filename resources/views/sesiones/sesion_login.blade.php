@extends("plantilla")

@section("contenido")
<h4>Sesiones con Laravel</h4>

<h4>
  Usuario que ingreso sesion:
  <span style="color:#0089ff">
    {{ $nombreSesion }}
  </span>
</h4>

<a href="{{ route("sesiones_en_laravel") }}">
  <button value="Leer mas contenido." class="btn btn-primary">
    Regresar al tema anterior
  </button>
</a>

@stop
