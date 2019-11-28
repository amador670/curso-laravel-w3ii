@extends("plantilla") 
@section("contenido")
<h4>Subir Proyecto Laravel a Hosting</h4>
<h4>Ejemplo con Hosting 000webhost</h4>

<ol>
    <li>Entramos con nuestra cuenta de usuario a 000webhost (En caso de no tener cuenta crearla)</li>
    <li>Comprimir a .zip nuestro proyecto laravel</li>
    <li>Subirlo mediante el administrador de archivo o mediante FTP (Filezilla)</li>
    <li>Descomprimir el archivo .zip</li>
    <li>Añadir la carpeta <b>public</b> de laravel en la carpeta <b>public_html</b> de nuestro hosting</li>
    <li>Añadir las carpetas y archivos restantes de nuestro proyecto en otra carpeta con el nombre de nuestro proyecto en local
        fuera de la carpeta public_html</li>
    <li>Entrar al archivo index.php de la carpeta public_html y añadir las siguientes lineas de codigo:</li>

    <pre>        
    require __DIR__.'/../curso-laravel-w3ii/vendor/autoload.php';

    $app = require_once __DIR__.'/../curso-laravel-w3ii/bootstrap/app.php';

    $app->bind('path.public',function(){
        return __DIR__;
    });
    </pre>

    <p>Donde <b>curso-laravel-w3ii</b> sera reemplazado por el nombre de nuestro proyecto</p>

    <li>Luego vamos a la carpeta de nuestro proyecto y editamos el archivo <b>.env</b> y verificamos que estas propiedades esten
        correctas
    </li>

    <pre>
        APP_ENV=production
        APP_DEBUG=false
    </pre>

    <li>Luego nos vamos a la carpeta <b>config</b> archivo <b>app.php</b> y copiamos la llave primaria de .env en la parte que
        dice:
    </li>

    <pre>
    'key' => env('APP_KEY', 'acá copiamos la llave primaria'),
    </pre>

    <li>Añadimos permisos (777) a la carpeta <b>bootstrap, storage, vendor</b>, tambien añadimos permisos (777) a cada archivo
        y carpeta dentro de ellas, añadimos permisos (777) a la carpeta del proyecto que se encuentra fuera de public_html,
        y al archivo dentro de public_html <b>index.php</b></li>
</ol>

<br>
<p>Al finalizar con estos archivos ya nuestro proyecto de laravel debe estar en linea, hay que verificar que la version de php
    de nuestro hosting sea igual a la de nuestro proyecto laravel</p>

<h4>Nota:</h4>
<p>En ocasiones al subir nuestro proyecto a laravel debemos ejecutar diferentes comandos en laravel, seleccionamos nuestro proyecto
    con la consola de comando CMD y hacemos lo siguiente</p>

<ul>
    <li>Generamos una nueva llave con php artisan key:generate</li>
    <li>php artisan config:cache</li>
    <li>php artisan config:clear</li>
    <li>php artisan view:clear</li>
    <li>composer update</li>
    <li>php artisan route:clear</li>
    <li>Eliminamos los archivos de la carpeta storage > framework > cache y demas carpetas</li>
</ul>

<br>
<hr>
<h4>Subir Base de datos</h4>
<p>A la hora de subir nuestra base de datos a nuestro hosting nuestras carpetas <b>public_html</b> y la carpeta del proyecto <b>config > database</b> deben tener permiso <b>777</b>, ademas que debemos añadir la siguiente linea de codigo en nuestro archivo database</p>

    <pre>
 'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'id7637922_martinezr_database'),
            'username' => env('DB_USERNAME', 'id7637922_amador'),
            'password' => env('DB_PASSWORD', '04163886836amador'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            <b>// Additional options here
            'options' => [PDO::ATTR_EMULATE_PREPARES => true, PDO::MYSQL_ATTR_COMPRESS => true],</b>
        ],
    </pre>


@stop