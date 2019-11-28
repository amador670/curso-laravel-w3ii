@extends("plantilla")


@section("contenido")

<h4>Configurar Laravel</h4>
<h4>Archivo (.env)</h4>

<p>El directorio de configuración, como su nombre indica, contiene todos los archivos de configuración de la aplicación. En este directorio, se encuentran varios archivos necesarios para configurar la base de datos, la sesión, correo electrónico, aplicaciones, servicios, etc. </p>

<h4>Configuracion Basica</h4>

<p>Después de instalar laravel, lo primero que tenemos que hacer es establecer el permiso de escritura para el directorio storage y bootstrap/cache.</p>

<p>Generar la clave de aplicación para asegurar sesión y otros datos cifrados. Si el directorio raíz no contiene el .env archivo a continuación, cambiar el nombre del .env.example a .env archivo y ejecutar el siguiente comando en el que ha instalado laravel. La clave recién generada se puede ver en la .env archivo.</p>

<p>En la consola CMD ingresamos <b>php artisan key:generate</b></p>

<p><p>Luego modificamos el archivo .env con los siguientes valores:</p></p>

<pre>
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:JZTSoCEggUnRCxvlq0JUgdcM9fAunNhyyAtgB8KBe/c=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=<b>http://localhost</b> Url de la aplicacion

DB_CONNECTION=<b>mysql</b> Tipo de base de datos
DB_HOST=<b>127.0.0.1 </b> Puerto del localhost
DB_PORT=<b>3306</b> Puerto de la base de datos 
DB_DATABASE=<b>practica_laravel</b> Nombre de la base de datos
DB_USERNAME=<b>root</b> Nombre del usuario
DB_PASSWORD=<b>Clave de la base de datos</b>
</pre>

@stop