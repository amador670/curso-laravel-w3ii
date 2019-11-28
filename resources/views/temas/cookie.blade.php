@extends("plantilla")

@section("contenido")

<h4>Cookie con Laravel</h4>

<p>Una vez que hemos creado una cookie podemos obtener la cookie mediante el metodo cookie(), este metodo llevara solo un argumento que sera el nombre de la cookie. El metodo cookie puede ser llamado mediante el uso de la instancia Illuminate\Http\Request</p>

<p><b>$response->withCookie(cookie('name', 'value', $minutes) );</b></p>

<h4>Retornar una cookie: </h4>

<p>$value = $request->cookie('name');</p>

<h4>Añadir una coockie sin fecha de vencimiento</h4>

<p>response->withCookie(cookie() ->forever('name', 'value'));</p>

<hr>

<!--Estas cookies estan en viewController en la funcion cookie-->
<!--Cookie 1-->
<h4 style="color:red">{{ request()->cookie("cookieLaravel") }}</h4>
<!--Cookie 2-->
<h4 style="{{ request()->cookie("cookieBackground") }}">Este texto tendra color de fondo mediante una cookie</h4>

<form action="{{ route('cookie') }}" method="get">
  <input type="submit" value="Recargar y mostrar las cookies" class="btn btn-success" style="float:left; padding:7px; margin: 15px 0px;">
</form>

@stop