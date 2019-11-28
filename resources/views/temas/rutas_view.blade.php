@extends("plantilla")

@section("contenido")

<h4>Rutas - View en Laravel</h4>

<p>En el marco de MVC, la letra “V” significa Views . Se separa la lógica de aplicación y la lógica de presentación. Las vistas se almacenan en resources/views directorio. En general, la vista contiene el código HTML que será servido por la aplicación. </p>

<h4>Metodo share()</h4>

<p>Share() es un método que se llevará a dos argumentos, clave y valor. Normalmente share() método puede ser llamado desde el método de arranque del proveedor de servicios. Podemos utilizar cualquier proveedor de servicios, AppServiceProvider o nuestro propio proveedor de servicios. </p>

<p>Para añadir una variable con el metodo share() debemos cambiar el código del método <b>app/Providers/AppServiceProvider.php</b></p>

<p>Esta texto esta dentro de una variable share() que se encuentra en app/Providers. <b style="color:blue;"><?php echo $variableShare; ?></b></p>

@stop