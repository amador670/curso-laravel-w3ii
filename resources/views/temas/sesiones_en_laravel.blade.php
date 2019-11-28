@extends("plantilla")

@section("contenido")
<h4>Sesiones en Laravel</h4>

<h4>Acceso a los datos de sesion</h4>

<p>Para acceder a los datos de la sesión, necesitamos una instancia de la <b>sesión ($request->session())</b> que se puede acceder a través de petición HTTP. Después de conseguir el ejemplo, podemos utilizar el método <b>get()</b>, que tendrá un argumento, <b>“key”</b> , para obtener los datos de la sesión. Ejemplo:</p>

<pre>$value = $request->session() ->get('key');</pre>

<p>Tambien se puede utilizar <b>all()</b> método para obtener todos los datos de la sesión en lugar de get() método. </p>

<h4>Almacenamiento de datos de sesion</h4>

<p>Los datos pueden ser almacenados en la sesión con el <b>put()</b> método. El put() método se llevará a dos argumentos, la <b>“key”</b> y el <b>“value”</b> .</p>

<pre>$request->session() ->put('key', 'value');</pre>

<h4>Borrar datos de sesion</h4>

<p>forget() es un método que se utiliza para eliminar un elemento de la sesión. Este método se llevará “key” como el argumento. Ejemplo:</p>

<pre>$request->session() ->forget('key');</pre>

<p>Utilice <b>flush()</b> método en lugar de forget() método para borrar todos los datos de la sesión. Usar la <b>pull()</b> método para recuperar datos de sesión y eliminarlo después. El pull() método también tendrá “key” como el argumento.</p> 

<p>La diferencia entre el metodo forget() y pull() es que forget() método no devolverá el valor de la sesión y pull() devolverá y eliminar ese valor de la sesión. </p>

<hr>

{{-- @if(request()->session()->get("nombre"))
<h4>
  Saludos 
  <span style="color:#0089ff">
    {{request()->session()->get("nombre")}}
  </span>
</h4>
@endif --}}

@if(session()->has("nombre"))
<h4>
  Saludos
  <span style="color:#0089ff">
    {{session("nombre")}}
  </span>
</h4>
@endif

<h4>Formulario con Sesion</h4>
  <div class="">
    <form method="post" action="sesiones/sesion_login">
      {!! csrf_field() !!}

      <div class="form-group">
        <input type="text" name="usuario" placeholder="Nombre" class="form-control">
      </div>

       <input type="submit" value="Iniciar Sesion" class="boton-enviar btn btn-primary mb-5">
    </form>
  </div>

@stop