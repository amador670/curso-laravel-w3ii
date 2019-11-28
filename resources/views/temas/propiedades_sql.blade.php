@extends("plantilla") 
@section("contenido") 
<h4>Propiedades SQL</h4>
<p>Estas propiedades nos permiten crear, actualizar, eliminar y modificar los diferentes datos de nuestras tablas de SQL</p>

<p><b>Crear el controller CRUD</b> abrimos la consola de nuestro proyecto laravel y escribimos <b>php artisan make:controller nombre_del_controller -r</b></p>

<p><b>Añadir las clases en el documento creado:</b></p>
<pre>
    use Carbon\Carbon;
    use DB;
</pre>

<h2>Crear datos en la tabla</h2>
<pre>
      db::table("mensajes")
            ->insert([
                "nombre" => $request->input("nombre"),
                "clave" => $request->input("clave"),
                "comentario" => $request->input("comentario"),
                "opinion_del_sitio_web" => $request->input("selectOption"),
                //Valor fecha de creacion
                "created_at" => Carbon::now(),
                //Valor fecha de actualizacion
                "updated_at" => Carbon::now(),
            ]);
</pre>

<h2>Mostrar todos los datos (valores)</h2>
<pre>
    $mensajes = db::table("mensajes")->get();
    //Mostrar los valores en reversa
    $mensajes = $mensajes->reverse();
</pre>

<h2>Mostrar un valor segun su id</h2>
<p>En la funcion se añade como parametro $id para indicar que en la tabla buscaremos donde el id sea igual al $id (parametro de la funcion)</p>
<pre>
    $mensaje = db::table("mensajes")->where("id", $id)->first();
</pre>

<h2>Actualizar un valor (funcion update)</h2>
<pre>
    db::table("mensajes")->where("id", $id)->update([
            "nombre" => $request->input("nombre"),
            "comentario" => $request->input("comentario"),
            "opinion_del_sitio_web" => $request->input("selectOption"),
            "updated_at" => Carbon::now(),
        ]);
</pre>

<h2>Borrar un valor</h2>
<pre>
    db::table("mensajes")->where("id", $id)->delete();
</pre>

<h2>Propiedades Extras:</h2>
<p><b>Redireccionar:</b></p>
<pre>
    return redirect()->route("mensajes.create");
</pre>

@stop