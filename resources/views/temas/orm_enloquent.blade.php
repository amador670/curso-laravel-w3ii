@extends("plantilla") 
@section("contenido")
<h4>ORM manejador de base de datos Enloquent</h4>

<p>
    Eloquent es el ORM que incluye Laravel para manejar de una forma fácil y sencilla los procesos correspondientes al manejo
    de bases de datos en nuestro proyecto, gracias a las funciones que provee podremos realizar complejas consultas y peticiones
    de base de datos sin escribir una sola línea de código SQL.
</p>

<h4>Propiedades para manejar bases de datos con Enloquent</h4>

<p>Ejecutamos en la consola de comandos de nuestro proyecto el siguiente comando <b>php artisan make:model nombre_enloquent</b>    luego de crear el modelo enloquent añadimos en el archivo:</p>

<pre>
    //Nombre de la tabla que buscara enloquent
    protected $table = "ejemplo_tabla" ;

    //Nombre de las propiedades de la base de datos donde se permitiran creaciones de datos masivos
    protected $fillable = ["nombre", "clave", "comentario", "telefono"];
</pre>

<p><b>Añadir la clase Enloquent</b> en nuestro controlador CRUD, en este caso el nombre del archivo creado:</p>
<pre>
    use App\contactoModelEnloquent;
</pre>

<p><b>Añadir el route::resource Enloquent</b>, en el archivo <b>routes/web.php</b></p>

<pre>
    Route::resource("contactos", "contactosController");
</pre>

<p>Donde "contactos" sera nuestro recurso (carpeta donde se encuentran nuestros archivos) y "contactosController". Cada route
    tendra acceso por los nombres de las funciones del controlador, ejemplo contacto.create, contacto.index, contacto.update,
    etc
</p>

<h2>Crear datos en la tabla</h2>
<p><b>Forma N° 1</b></p>
<pre>
        $contactos = new contactoModelEnloquent;
        $contactos->nombre = $request->input("nombre");
        $contactos->clave = $request->input("clave");
        $contactos->comentario = $request->input("comentario");
        $contactos->opinion_del_sitio_web = $request->input("selectOption");
        $contactos->save(); 
</pre>

<p><b>Forma N° 2</b></p>
<pre>
    contactoModelEnloquent::create([
                "nombre" => $request->input("nombre"),
                "clave" => $request->input("clave"),
                "comentario" => $request->input("comentario"),
                "opinion_del_sitio_web" => $request->input("selectOption"),
            ]);
</pre>

<h2>Mostrar todos los datos (valores)</h2>
<pre>
     $contactos = contactoModelEnloquent::all();
     //Mostrar los valores en reversa
     $contactos = $contactos->reverse();
</pre>

<h2>Mostrar un valor segun su id</h2>

<p>
    //el metodo findOrfail significa encuentra o falla, en caso de que se intente buscar un mensaje que no exista por ese $id
    da error 404...
</p>
<pre>
    $contactos = contactoModelEnloquent::findOrfail($id);
</pre>

<h2>Actualizar un valor (funcion update)</h2>
<pre>
    $contactos = contactoModelEnloquent::findOrfail($id);
    $contactos->update($request->all());
</pre>

<h2>Borrar un valor</h2>
<pre>
    $contactos = contactoModelEnloquent::findOrfail($id)->delete();
</pre> 
@stop