@extends("plantilla")
@section("contenido")

<h4>Subir imagen - Propiedad File - Intervention Image</h5>

<ol>
    <li>Crear nuestro formulario de forma normal y añadir la propiedad <b>enctype="multipart/form-data"</b></li>

    <li>Crear el "div" donde mostraremos la imagen &lt;img src&gt; cargada por el formulario</li>

    <li>Importar en la consola CMD de nuestro proyecto la libreria <b>php composer require intervention/image</b>. <a href="http://image.intervention.io/">Image Intervention Web</a></li>

    <li>Añadir las propiedades en nuestra carpeta <b>config > app</b></li>

    <pre>

        'providers' => [
            /* Image intervention package */
            Intervention\Image\ImageServiceProvider::class,
        ]

        'aliases' => [
            /* Image intervention package */
            'Image' => Intervention\Image\Facades\Image::class,
        ]
    </pre>

    <li>Por ultimo añadimos en nuestro controller a usar <b>use Intervention\Image\ImageManagerStatic as Image;</b></li>

    <li>Cargaremos las imagenes a la carpeta por defecto <b>"Storage"</b> por medidas de seguridad de que el usuario no carge los archivos directamente a la carpeta <b>public</b> de nuestro directorio</li>

    <li>En la consola CMD de nuestro proyecto usamos la propiedad <b>php artisan storage:link</b> para crear un link simbolico de "storage/app/public" en la carpeta public/storage, es decir crear un archivo directo</li>

    <li>Añadimos las siguientes propiedades en nuestro metodo <b>store</b> de nuestro controller, despues de crear los datos a la base de datos</li>

    <pre>

        //Si hay un archivo en el input
        if ($request->hasFile("avatar")) {

            //Cargamos nuestro archivo en una variable
            $file = $request->file("avatar");

            //Cargamos su extension (en este caso .jpg, png, extension de la imagen)
            $extension = $file->getClientOriginalExtension();

            //Le damos un nombre aleatorio (por seguridad) y le añadimos la extension
            $fileName = rand(111, 99999) . '.' . $extension;
        
            //Cargamos el destino de nuestro archivo
            $destinationPath = public_path('storage/');

            //Indicamos la ruta + el nombre final de nuestro archivo
            $image_url = $destinationPath . $fileName;
        
            //Creamos la imagen y la redimensionamos (propiedad image/intervention)
            $file = Image::make($file)->resize(150, 150);

            //Guardamos el archivo en la ruta indicada
            $file->save($image_url);        

            //Retornamos nuestro archivo en la variable a mostrar
            $mensajes->avatar = $fileName;
        }
        
        //Guardamos los datos en la variable de enloquent (base de datos)
        $mensajes->save();
    </pre>

<h4 class="text-success">Con esto ya podemos subir una imagen a una caja de comentarios</h4>

</ol>
@stop