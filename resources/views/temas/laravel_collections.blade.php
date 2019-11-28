@extends("plantilla")
@section("contenido")

<h4>Collections en Laravel</h4>

<p>Agrega funcionalidades a los arrays de php de forma dinamica, permitiendo manipularlos en forma de objetos</p>

<p>Añadimos en nuestro controller el metodo <b>use Illuminate\Support\Collection as collection;</b></p>

<p>Luego añadimos en el metodo a utilizar la propiedad collection, hay tres forma diferentes de utilizarla.</p>

<pre>
    //1era forma de crear una coleccion
    $array = new collection($array);

    //2da forma de crear una coleccion
    //$array = collection::make($array);

    //3era forma de crear una coleccion
    //$array = collect($array);

    //Retornamos en nuestra view.
    return view("index", compact("$array"));
</pre>

<p>Mas colecciones en la página oficial de <a href="https://laravel.com/docs/5.8/collections#available-methods">laravel collections</a></p>

<h4>Ejemplo:</h4>
<p><b>Primer elemento del array.</b> $array->first(). {{ $arrayFamilia->first()}}</p>

<p><b>Ultimo elemento del array.</b> $array->last(). {{ $arrayFamilia->last()}}</p>

<p><b>Cuantos elementos existen en el array.</b> $array->count(). {{ $arrayFamilia->count()}}</p>

<p><b>Quitar un elemento del array.</b> $array->slice(1). {{ $arrayFamilia->slice(1)}}</p>

<p><b>Añadir un nuevo elemento.</b> $array()->push(). {{ $arrayFamilia->push("mi perrito mancha") }}</p>

<p><b>Eliminar un elemento.</b> $array->splice(). {{$arrayFamilia->splice(0, 1)}} {{-- Se elimina el primer elemento (0) en su posicion (1) --}}</p>

<p><b>Pasar un array con la llave de la base de datos por parametro.</b> Ejemplo $users->pluck('name')</p>

<p><b>Verifica si una coleccion tiene un elemento especifico.</b> $names = $users->pluck('name'); $names->contains('Amador') {{-- En la variable $names llamamos a la propiedad name dentro de la base de datos y luego con contains verificamos si existe alguien con el nombre seleccionado --}}</p>

<p><b>Concatenar metodos.</b> Ejemplo $users->pluck("name")->contains("Amador")</p>

<p><b>Separar los array mediante un string.</b> $array->implode(" - ")</p>

<hr>
<h4>Colecciones solo para las bases de datos con Enloquent</h4>

<p>Enloquent Collection, <a href="https://laravel.com/docs/5.8/eloquent-collections">link aquí</a></p>

<p class="mb-5">Estas colecciones son reescritas y modificadas para interactuar con la base de datos mediante el metodo enloquent, de igual forma son añadidas nuevas propiedades</p>

@stop