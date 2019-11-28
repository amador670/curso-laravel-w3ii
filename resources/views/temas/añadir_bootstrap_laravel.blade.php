@extends("plantilla")
@section("contenido")
<h4>Añadir Bootstrap a Laravel</h4>

<p>Para añadir el framework bootstrap a Laravel debemos ejecutar los siguientes pasos:</p>

<ol>
    <li>Añadimos bootstrap en nuestra carpeta <b>public / css / bootstrap.css</b> y en la carpeta <b>public / js / </b> los archivos
        bootstrap.min.js, jquery-slim.js y popper.min.js</li>
</ol>

<h4>Ejemplo:</h4>

<div class="container-fluid">
    <div class="row">

        <div class="col-12 col-sm col-md">
            <div class="alert alert-info">
                <strong>ALERT FIVE</strong> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus dignissimos
                optio consequatur, aut, quibusdam placeat beatae expedita, reprehenderit libero itaque provident dolor doloremque.
                Distinctio voluptas non aliquam, iure laudantium cumque!

                <div class="text-center">
                    <a href="#" class="alert-link text-dark" data-dismiss="alert">Cerrar Advertencia</a>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/js/jquery-slim.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

@stop