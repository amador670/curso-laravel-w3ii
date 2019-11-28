@extends("plantilla")

@section("contenido")
<h4>Controladores - Controllers</h4>

<h4>Ejemplos:</h4>

<p>Url: <b>{{ request()->url() }}</b></p> 
<p>Metodo: <b>{{ request()->method() }}</b></p>
<p>{{ $example }}</p>

<h4>Crear un controlador</h4>

<p>Un controlador actúa como un tráfico de dirección entre las vistas y modelos. Crear controlador en CMD: <b>php artisan make:controller "controller-name" </b>, El constructor creado se puede ver en app/Http/Controllers.</p>

<h4>Añadir sintaxis en routes/web.php</h4>

<pre>
Route::get('profile', [
   'middleware' => 'auth',
   'uses' => 'UserController@showProfile'
]);
</pre>

<p>Mas ejemplos en: <b>http://www.w3ii.com/es/laravel/laravel_controllers.html</b></p>

@stop