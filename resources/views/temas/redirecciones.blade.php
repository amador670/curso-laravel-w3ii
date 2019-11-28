@extends("plantilla")

@section("contenido")

<h4>Redirecciones</h4>
<h4>Rutas con Nombres</h4>

<p><b>Redireccion de rutas con nombres</b> es usado para dar nombre específico a una ruta. El nombre se puede asignar con el “as” clave de la matriz. Ejemplo</p>

<pre>
Route::get('user/profile', ['as' => 'profile', function () {
   //
}]);
</pre>

<p>En este ejemplo hemos dado el nombre de “profile” a la ruta “user/profile” quiere decir que esa ruta sera identificada solo con el nombre añadido en la propiedad "as".</p>

<h4>Metodo redirect()</h4>

<p>Este metodo nos permite redireccionar ha una ruta asignada con el metodo "as" en los "route" añadiendole un nombre especifico. Ejemplo</p>

<pre>
Route::get('user/profile',function() {
   return redirect()->route('profile');
});  
</pre>

<p>Y si queremos hacer que la ruta tenga como accion un controlador se añade de la siguiente forma</p>

<pre>
Route::get('user/profile',function() {
   return redirect()->action('viewController@redirecciones');
});
</pre>

<p>Mas informacion en <b>http://www.w3ii.com/es/laravel/laravel_redirections.html</b></p>

@stop