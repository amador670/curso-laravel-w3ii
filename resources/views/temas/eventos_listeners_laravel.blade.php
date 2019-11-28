@extends("plantilla")

@section("contenido")
<h4>Eventos y listeners en Laravel</h4>

<p>Los eventos y listeners en laravel son muy utiles ya que permiten optimizar parte del codigo de una aplicacion, son a su vez un estilo de programacion ya que pueden ser reemplazados y solucionados de otra forma. Un evento y listeners en laravel nos permite enviar correos de notificacion, correo de registros, de suscripcion, entre otros casos al usuario y/o administrador. Un ejemplo seria</p>

<p>Por ejemplo, tenemos un procedimiento para el registro de usuario: ingreso de datos, validación, etc… hasta que al final terminamos el registro del usuario, ahí mismo es donde podemos desencadenar un evento el cual por ejemplo puede llamarse: UsuarioRegistrado este al ser un evento puede ser usado por los events listeners que estarán al pendiente de que ocurra un evento un específico para desencadenar una acción.</p>

<p>Otro ejemplo seria nosotros podemos crear un oyente de eventos llamado BienvenidaUsuario, lo que hará es mandar un mensaje de correo electrónico cada vez que un usuario nuevo se registre. En este caso, este oyente estará a la escucha de que sea disparado
un evento llamado UsuarioRegistrado, en el momento que ocurra podemos desencadenar la acción de enviarle un mensaje de bienvenida.</p>

<h4><a href="http://blog.adolfocuadros.com/programacion/laravel/eventos-en-laravel-y-lumen-5-3/">Más informacion de uso...</a></h4>

<h4><a href="https://code.tutsplus.com/es/tutorials/custom-events-in-laravel--cms-30331">Segundo tutorial...</a></h4>
@stop