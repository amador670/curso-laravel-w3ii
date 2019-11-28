@extends("plantilla")
@section("contenido")
<h4>Control de base de datos - Migrations (Migraciones)</h4>

<p>Las migraciones en Laravel son como un control de versiones que nos permiten llevar el control de nuestra base de datos de forma compleja y eficaz</p>

<p>Las migraciones son archivos que se encuentran en la ruta database/migrations/ de nuestro proyecto Laravel, por defecto en la instalación de Laravel 5 se encuentran dos migraciones ya creadas, create_users_table y create_password_resets_table.</p>

<h4>Crear migraciones en Laravel</h4>

<p>Para crear nuestras migraciones en Laravel se usa el siguiente comando: </p>

<p><b>php artisan make:migration nombre_de_la_accion_que_realiza_la_migracion --create=nombre_tabla</b></p>

<p>Laravel al crear una migración agrega como préfijo la fecha y hora en la que fué creada la migración para poder ordenar qué migración va antes que otra. </p>

<p>Dentro de la estructura del archivo podemos ver dos funciones, una llamada <b>up()</b> y otra llamada <b>down()</b>, la primera funciónes en donde vamos a especificar la estructura de nuestra tabla, inicialmente y gracias al comando se encuentran ya algunas cosas escritas como lo son la clase <b>Schema</b> en la cual se llama al método <b>create</b>, el cual nos permite crear la tabla en nuestra base de datos, esta recibe dos parámetros, el primero es el nombre que va a recibir la tabla que se le dio en el comando y por lo cual ya se encuentra en su lugar, y el segundo parámetro es una función closure o función anónima que lo que hace es definir las columnas de nuestra tabla, a su vez esta función anónima recibe como parámetro un objeto de tipo Blueprint que se agregó dentro del namespace con la palabra use en la cabecera del archivo, el objeto $table es con el que vamos a trabajar para definir los campos. Ejemplo, esto se logra escribiendo $table->tipo_dato('nombre');,
y esto puede variar dependiendo el tipo de dato que se use. </p>

<p><a href="https://laravel.com/docs/5.0/schema#adding-columns">Aquí</a> puedes ver todos los tipos de campos con los que contamos en Laravel</p>

<h4>Iniciar nuestras migraciones</h4>

<p>Ahora bien si la función <b>up</b> crea nuestra tabla en la base de datos, la función <b>down</b> logicamente hace lo opuesto, y eso es eliminar la tabla de la base de datos, por eso dentro de esta función podemos observar que de la misma clase Schema se llama al método drop que significa dejar caer o dar de baja.</p>

<p>Para correr o iniciar nuestras migraciones usamos el comando: <b>php artisan migrate</b></p>

<p>Con esto si es la primera vez que se ejecuta este comando se creará en nuestra base de datos la tabla migrations que es la encargada de llevar el control de que migraciones que ya han sido ejecutadas, con el fin de no correr el mismo archivo más de una vez si el comando se usa nuevamente.</p>

<p>Entonces si creamos nuestra migración crear_tabla_pasteles y usamos el comando php artisan migrate como resultado en nuestra base de datos se agregará la tabla <b>nombre_de_la_tabla</b> y en la tabla migrations se añadirá el registro de la migración recien ejecutada.</p>

<p><b>Borrar datos de una tabla</b> Si queremos ejecutar la funcion <b>down</b> de nuestra tabla usamos el comando:</p>

<p><b>php artisan migrate:rollback</b> que lo que hará es deshacer la última migración ejecutada y registrada en la base de datos.</p>

<p><b>php artisan migrate:reset</b> que lo que hará es deshacer todas las migraciones de la base de datos.</p>

<p><b>Nota:</b> El comando <b>php artisan migrate:refresh</b> nos permite usar php artisan migrate:reset y después php artisan migrate.</p>
@stop