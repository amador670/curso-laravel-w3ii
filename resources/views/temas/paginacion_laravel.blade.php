@extends("plantilla") 
@section("contenido")
<h4>Paginacion en Laravel</h4>

<p>Esta propiedad nos permite llevar un mayor control de los datos que vamos a mostrar, principalmente cuando usamos MySQL o
    nos conectamos alguna base de datos.</p>

<ol>
    <li>
        Usar esta propiedad es facil, solo debemos usar la siguiente propiedad en el metodo de nuestro controlador que retornamos
        los datos, ya sea por base de datos o enloquent, con las propiedades <b>get()</b> o <b>all()</b> las reemplazamos
        por <b>paginate()</b>

        <pre>

        //Propiedad - Controlador mensajesController, metodo create()
        $mensajes = mensajeEnloquent::orderBy('id', 'desc')->paginate(5); 
        
        //retornamos la vista
        return view("mensajes.create", compact("mensajes"));
        </pre>
    </li>
    <li>
        En html o nuestra vista añadimos lo siguiente

        <pre>
        { { $mensajes->render() }}
        </pre>
    </li>
    <li>Listo ya podremos utilizar la propiedad paginate() de laravel</li>
</ol>

@stop