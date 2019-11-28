@extends("plantilla")

@section("contenido")
<h4>Constructor de Consultas Query Builder</h4>
<h4>Implementacion REST</h4>

<p>REST es un sistema de diseño de software.</p>
<p>Mediante este metodo crearemos un controller que nos permitira manejas y editar nuestra base de datos de forma sencilla, rapida y compleja. Para esto usamos un metodo llamado <b>CRUD</b> que significa </p>

<pre>
    Create - Crear
    Read - Leer
    Update - Actualizar
    Delete - Borrar
</pre>

<br><h4>Pasos para llevar a cabo nuestro metodo CRUD</h4><br>

<ol>
    <li>Creamos nuestro controller <b>CRUD</b>. Escribimos en la consola CMD de nuestro proyecto <b>php artisan make:controller</b> nombre_del_controller <b>-resource</b></li>
    <li>Luego de haber creado nuestro controller ya podremos acceder a los distintos metodos de nuestro metodo CRUD</li>
</ol>

<br><h4>Explicacion de cada funcion CRUD</h4><br>

<ol>
    <li><b>function Index.</b> Aqui añadimos la vista de redireccion al enviar los datos al formulario, es el index despues de enviar los datos, se debe redirigir al view() de esta funcion despues del envio de datos</li>

    <li><b>function Create.</b> En esta funcion añadimos el view() principal, en este caso al que se accede de forma general, aca es donde se añade la vista que permite llenar el formulario y crear los datos de usuario</li>

    <li><b>function Store.</b> Es donde se guarda y se redirecciona los datos ingresados en el formulario, aca enviamos los datos a la base de datos y luego lo redireccionamos como ejemplo a la funcion index, o si queremos que muestre otra pagina como ejemplo la pagina anterior</li>
    
    <li><b>function Show($id)</b>. Aca mostramos un mensaje especifico de la base de datos, en esta funcion el ejemplo es el $id, aca podemos traer de vuelta algun usuario de la base de datos y mostrarlo en pantalla, por lo general aca se muestra un comentario o mensaje en especifico segun el $id para posteriormente editarlo</li>

    <li><b>function Edit($id)</b>. Por lo general los datos de esta funcion son similar a la funcion show($id), ya que esta es la que se encarga de mostrar los datos incresados en un formulario para editarlos</li>

    <li><b>function Update(Request $request, $id)</b>. Esta funcion es para actualizar el mensaje o comentario enviado a la base de datos, de esta forma indicamos que el mensaje editado con la funcion edit($id) sera actualizado</li>

    <li><b>function Destroy($id)</b>. Para finalizar tenemos esta funcion que nos permite eliminar el mensaje o comentario de la base de datos segun el $id seleccionado</li>
</ol>
@stop