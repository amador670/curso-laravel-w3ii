@extends("plantilla") 
@section("contenido")
<h4>Envio de Correo en Larvel de forma local.</h4>

<p>Laravel utiliza libre biblioteca llamada “SwiftMailer” para enviar mensajes de correo electrónico. Utilizando la función
    de la biblioteca, se puede enviar fácilmente mensajes de correo electrónico sin demasiadas molestias. Las plantillas
    de correo electrónico se cargan de la misma manera como vistas, lo que significa que puede utilizar la sintaxis de la
    hoja e inyectar datos en sus plantillas. La siguiente es la sintaxis de la función de envío. </p>

<hr>

<h4 class="text-success">Pasos para implementar envio de email por <i>Mailtrap</i></h4>

<ol>
    <li>Editar el archivo <b>config > mail.php</b></li>

    <li>
        Cambiar los siguientes archivos.

        <pre>

        'host' => env('MAIL_HOST', 'smtp.mailtrap.io'),
        'port' => env('MAIL_PORT', '2525'),

        //Añadimos nuestro email y el nombre de la persona o aplicacion
        'from' => ["address" => "amadorjosemartinezrivera600@gmail.com", "name" => "Amador J. Martinez R."],

        //Añadimos el nombre y contraseña de usuario que nos proporsiona mailtrap.io
        'username' => env('MAIL_USERNAME', 'aa6389cc6f27cb'),
        'password' => env('MAIL_PASSWORD', '08be2a99d3d63e'),            
        </pre>
    </li>

    <li>Configuramos el archivo <b>.env</b>

        <pre>

        MAIL_DRIVER=smtp
        MAIL_HOST=smtp.mailtrap.io
        MAIL_PORT=2525
        MAIL_USERNAME=aa6389cc6f27cb
        MAIL_PASSWORD=08be2a99d3d63e
        MAIL_ENCRYPTION=null
        </pre>
    </li>

    <li>Entramos y creamos una cuenta en mailtrap.io y establecemos nuestra cuenta, de alli sacamos el username y password</li>

    <li>Importamos la clase mail al principio del controlador <b>use mail</b></li>

    <li>Creamos la vista (view) del mensaje, creamos una carpeta mail, y adentro añadimos mail.blade.php, en este creamos un
        archivo html en forma de vista que es lo que vera el usuario.</li>

    <li> Añadimos en el controlador que queremos usar el envio de email


        <pre>
            
        Mail::send('mail.mail', ["Mensaje enviado de forma exitosa"], function($mensaje) {
            $mensaje->to('amadorjosemartinezrivera600@gmail.com')->subject('Mensaje enviado por Laravel Mail');
            $mensaje->from('amadorjosemartinezrivera600@gmail.com', 'Amador J. Martinez R.');
        });  
        </pre>
    </li>

    <li>Listo ya podremos recibir y enviar mensajes mediante mailtrap.io de forma local.</li>
</ol>

<hr>
<h4 class="text-success">Pasos para implementar envio de email por <i>Google Gmail</i></h4>

<ol>

    <li>Acceder a nuestra cuenta de Email > Ir a nuestro usuario (Clic en la foto de usuario) > Clic al boton "Cuenta de Google"
        > Clic en la pestaña "Seguridad" ubicada al lado izquierdo > Bajar y activar la opcion "Acceso de aplicaciones poco
        seguras".</li>

    <li>Acceder a <a href="https://myaccount.google.com/apppasswords?rapt=AEjHL4PmdIVC1odr2sRfuyI0O_tDrKFYOUyWfKpWhA_j9-T2Maqb9gxjt2o6XZMLiJ4HYWKOKr87lfWWf218QcFofCG2sCw38g">Autorizar aplicaciones el uso del correo</a> o tambien llamado "Google Apps Password".</li>

    <li>Registrar en Google Apps Password nuestra aplicacion de laravel y anotar la clave de 16 digitos generada por el sistema.</li>

    <li>Editar el archivo <b>config > mail.php</b></li>

    <li>
        Cambiar los siguientes archivos.

        <pre>

        'host' => env('MAIL_HOST', 'smtp.googlemail.com'),
        'port' => env('MAIL_PORT', '465'),

        //Añadimos nuestro email y el nombre de la persona o aplicacion
        'from' => ["address" => "amadorjosemartinezrivera600@gmail.com", "name" => "Amador J. Martinez R."],

        //Añadimos nuestro correo y contraseña de acceso total generada por <a href="https://myaccount.google.com/apppasswords?rapt=AEjHL4PmdIVC1odr2sRfuyI0O_tDrKFYOUyWfKpWhA_j9-T2Maqb9gxjt2o6XZMLiJ4HYWKOKr87lfWWf218QcFofCG2sCw38g">Google apps password</a>

        'username' => env('MAIL_USERNAME', 'amadorjosemartinezrivera600@gmail.com'),
        'password' => env('MAIL_PASSWORD', 'clave de 16 digitos generada'),           
        </pre>
    </li>

    <li>Configuramos el archivo <b>.env</b>

        <pre>

        MAIL_DRIVER=smtp
        MAIL_HOST=smtp.googlemail.com
        MAIL_PORT=465
        MAIL_USERNAME=amadorjosemartinezrivera600@gmail.com
        MAIL_PASSWORD=clave de 16 digitos generada
        MAIL_ENCRYPTION=ssl
        </pre>
    </li>

    <li>Listo ya podremos recibir y enviar mensajes mediante Google Email de forma local y en produccion, los demas pasos a seguir
        son iguales a los de Mailtrap, debemos importar la clase Mail en nuestro controlador y demas pasos de envio.</li>

    <p class="mt-2"><b>Nota:</b>
        <a href="https://myaccount.google.com/signinoptions/two-step-verification/enroll-prompt?pmr=1&rapt=AEjHL4NoEdUOyOc8qorn9g3LZ4J3LPAOLbhYxsTDj8ZzB6mbrJ-NOZ8pmo46jb8TsDB5i5e48rv68TmPqGMKSWPh2dkFxxNNiQ"> Verificacion de dos pasos</a>
    </p>

    <p><b>Nota:</b> En dado caso que de error o no funcione correctamente abrir la consola de comandos (CMD) de nuestro proyecto y borrar el cache con <b>php artisan config:cache</b></p>

    <p>Para mas información acceder a <a href="https://programacionymas.com/blog/como-enviar-mails-correos-desde-laravel">Envio de correo laravel en 3 pasos</a></p>
</ol>


<hr>
<h4 class="text-success">Propiedades y funcion Mail</h4>
<p><b>Sintaxis:</b> Mail:send('view', array $data[], Closure o function return)</p>

<p><b>Parametros:</b></p>

<p><b>$view/vista</b> - nombre de la vista que contiene el mensaje de correo electrónico</p>

<p><b>$array data (array)</b> - conjunto de datos para ver</p>

<p><b>Clousure, function return </b> - una devolución de llamada de cierre que recibe una instancia de mensaje, que le permite
    personalizar los destinatarios, el asunto y otros aspectos del mensaje de correo</p>

<p>En el tercer argumento, el cierre Clousure recibe la instancia de mensaje y con esa instancia también puede llamar a las
    siguientes funciones y alterar el mensaje.</p>

<pre>
$Mensaje->sujeto('Bienvenido al Tutorial');
$Mensaje->a partir de('email@example.com', 'Sr. Ejemplo');
$Mensaje-> a('email@example.com', 'Sr. Ejemplo'); 

Algunos de los métodos menos comunes incluyen -

$Mensaje-> remitente('email@example.com', 'Sr. Ejemplo');
$Mensaje-> ReturnPath('email@example.com ');
$Mensaje-> cc('email@example.com', 'Sr. Ejemplo');
$Mensaje-> BCC('email@example.com', 'Sr. Ejemplo');
$Mensaje-> replyTo('email@example.com', 'Sr. Ejemplo');
$Mensaje-> prioridad(2); 

Para adjuntar archivos o incrustar, puede utilizar los métodos siguientes -

$Mensaje-> attach('ruta / a / attachment.txt');
$Mensaje-> Insertar('ruta / a / attachment.jpg'); 
</pre>

<br>
<p>Correo se puede enviar como HTML o texto. Puede indicar el tipo de correo que desea enviar en el <b>primer argumento que pasa por la vista</b>    como se muestra a continuación. El tipo predeterminado es HTML. Si desea enviar el correo de texto sin formato a continuación,
    utilizar la siguiente sintaxis. </p>

<p>Mail::send(<b>[‘text’=>’text.view’]</b>, $data, $callback);</p>

@stop