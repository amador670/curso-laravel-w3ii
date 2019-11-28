@extends("plantilla")

@section("contenido")

<h4>Base de datos en Laravel</h4>

<p>La base de datos utilizada en este proyecto se llama <b>curso_laravel_w3ii</b>, tabla <b>estudiantes</b>.</p>

<p>Laravel soporta diferentes bases de datos, estas son: </p>

<ol>
  <li>MySQL</li>
  <li>Postgres</li>
  <li>SQLite</li>
  <li>SQL Server</li>
</ol>

<br>
<h4>Base de datos</h4>
<p>Podemos modificar el archivo que nos conecta a la bases de datos accedemos a <b>config > databases.php</b></p>

<pre>
  //Llave de configuracion que queremos
  'default' => env('DB_CONNECTION', 'mysql'),
</pre>

<p>Los archivos de la base de datos los modificamos tambien en el archivo .env</p>

<pre>
  //Nombre del lenguaje de base de datos
  DB_CONNECTION=mysql

  //Ip del host
  DB_HOST=127.0.0.1

  //Numero del puerto
  DB_PORT=3306

  //Nombre de la base de datos
  DB_DATABASE=curso_laravel_basico

  //Nombre del usuario y contraseña
  DB_USERNAME=root
  DB_PASSWORD=
</pre>

<br><h4>Bases de datos con CRUD</h4>

<p>Con Laravel podemos modificar una base de datos mediante SQL prima, el generador de consultas con fluidez, y la elocuente ORM. Se modificaran bases de datos usando el metodo CRUD (Create, Read, Update, Delete)</p>

<ul>
  <li>
    Create (Crear): Insertar registros usando la fachada DB con el método de inserción
  </li>
  <li>
    Read (Leer): Recuperar Registros, después de configurar la base de datos, podemos recuperar los registros utilizando la fachada DB con el método de selección.</li>
  <li>
    Update (Actualizar): Actualizar registros utilizando la fachada DB con el método de actualización.
  </li>
  <li>
    Delete (Eliminar): Eliminar el registro usando la fachada DB con el método de eliminación. 
  </li>
</ul>
@stop