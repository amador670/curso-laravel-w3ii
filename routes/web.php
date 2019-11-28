<?php
/*|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------*/

DB::listen(function($query){
    //echo "<pre>{$query->sql}</pre>";
});

//Index
Route::get("/", ["as" => "index", "uses" => "viewController@inicio"]);

//ROUTES de contenido y temas
route::get("instalacion_laravel", ["as" => "instalacion_laravel", "uses" => "viewController@instalacion_laravel"]);

Route::get("estructura_de_la_aplicacion", ["as" => "estructura_de_la_aplicacion", "uses" => "viewController@estructura_de_la_aplicacion"]);

route::get("configurar_laravel", ["as" => "configurar_laravel", "uses" => "viewController@configurar_laravel"]);

route::get("añadir_bootstrap_laravel", ["as" => "añadir_bootstrap_laravel", "uses" => "viewController@añadir_bootstrap_laravel"]);

Route::get("enrutamiento", ["as" => "enrutamiento", "uses" => "viewController@enrutamiento"]);

Route::get("middleware", ["as" => "middleware", "uses" => "viewController@middlewareLaravel"]);

Route::get("controladores", ["as" => "controladores", "uses" => "viewController@controladores"]);

Route::get("solicitud_metodo_path", ["as" => "solicitud_metodo_path", "uses" => "viewController@solicitud_metodo_path"]);

Route::post("envio/formulario", ["as" => "envio/formulario", "uses" => "formularioController@formularioUsuario"]);

Route::get("cookie", ["as" => "cookie", "uses" => "viewController@cookie"]);

route::get("rutas_view", ["as" => "rutas_view", "uses" => "viewController@rutas_view"]);

route::get("redirecciones", ["as" => "redirecciones", "uses" => "viewController@redirecciones"]);

Route::get('redirecciones/user', function () {
    return redirect()->action('viewController@redirecciones');
});

route::get("base_de_datos", ["as" => "base_de_datos", "uses" => "viewController@base_de_datos"]);

route::get("control_base_de_datos", ["as" => "control_base_de_datos", "uses" => "viewController@control_base_de_datos"]);

route::post("base_datos/mostrar_datos_db", ["as" => "base_datos/mostrar_datos_db", "uses" => "mostrar_datos_db_controller@mostrarDatos"]);

route::get("constructor_de_consultas_query", ["as" => "constructor_de_consultas_query", "uses" => "viewController@constructor_de_consultas_query"]);

route::get("propiedades_sql", ["as" => "propiedades_sql", "uses" => "viewController@propiedades_sql"]);

route::get("orm_enloquent", ["as" => "orm_enloquent", "uses" => "viewController@orm_enloquent"]);

route::get("autenticacion_de_usuario", ["as" => "autenticacion_de_usuario", "uses" => "viewController@autenticacion_de_usuario"]);

route::get("roles_en_laravel", ["as" => "roles_en_laravel", "uses" => "viewController@roles_en_laravel"]);

route::get("encriptar_clave", ["as" => "encriptar_clave", "uses" => "viewController@encriptar_clave"]);

route::get("autorizaciones_policies", ["as" => "autorizaciones_policies", "uses" => "viewController@autorizaciones_policies"]);

route::get("errores_en_laravel", ["as" => "errores_en_laravel", "uses" => "viewController@errores_en_laravel"]);

route::get("paginacion_laravel", ["as" => "paginacion_laravel", "uses" => "viewController@paginacion_laravel"]);

route::get("cache_laravel", ["as" => "cache_laravel", "uses" => "viewController@cache_laravel"]);

route::get("repositorios_y_docoradores", ["as" => "repositorios_y_docoradores", "uses" => "viewController@repositorios_y_docoradores"]);

route::get("formularios_html_en_laravel", ["as" => "formularios_html_en_laravel", "uses" => "viewController@formularios_html_en_laravel"]);

route::post("formularios/formulario_recibido", ["as" => "formularios/formulario_recibido", "uses" => "formularioController@formulario_html_en_laravel_recibido"]);

route::get("recibir_datos_request", ["as" => "recibir_datos_request", "uses" => "viewController@recibir_datos_request"]);

route::get("localizacion_language", ["as" => "localizacion_language", "uses" => "viewController@localizacion_language"]);

route::get('localization/{locale}', 'LocalizationController@index');

route::get('sesiones_en_laravel', ["as" => "sesiones_en_laravel", "uses" => "viewController@sesiones_en_laravel"]);

route::post("sesiones/sesion_login", ["as" => "sesiones/sesion_login", "uses" => "sesionController@index"]);

route::get("propiedades_de_validacion", ["as" => "propiedades_de_validacion", "uses" => "viewController@propiedades_de_validacion"]);

route::get("subir_archivos_file", ["as" => "subir_archivos_file", "uses" => "viewController@subir_archivos_file"]);

route::get("subir_imagen_intervention", ["as" => "subir_imagen_intervention", "uses" => "viewController@subir_imagen_intervention"]);

route::get("envio_de_correo_laravel", ["as" => "envio_de_correo_laravel", "uses" => "viewController@envio_de_correo_laravel"]);

route::get("eventos_listeners_laravel", ["as" => "eventos_listeners_laravel", "uses" => "viewController@eventos_listeners_laravel"]);

route::get("excepciones_http", ["as" => "excepciones_http", "uses" => "viewController@excepciones_http"]);

route::get("error404", ["as" => "error404", function () {
    abort(404);
}]);

route::get("laravel_collections", ["as" => "laravel_collections", "uses" => "viewController@laravel_collections"]);

route::get("subir_laravel_a_hosting", ["as" => "subir_laravel_a_hosting", "uses" => "viewController@subir_laravel_a_hosting"]);

/* ROUTES de la sección "contactos" con ENLOQUENT*/
Route::resource("contactos", "contactosController");

/* ROUTES de usuarios - Roles */
Route::resource("usuarios", "userController");

/* ROUTES de Auth */
//Register
Route::get('auth/register', ["as" => "register", "uses" => "registerUserController@index"]);
Route::post('auth/register', ['as' => 'register', 'uses' => 'registerUserController@store']);

//Login
route::get("auth/login", ["as" => "login", "uses" => "Auth\LoginController@showLoginForm"]);
route::post("auth/login", ["as" => "login", "uses" => "Auth\LoginController@login"]);
route::get("logout", ["as" => "logout", "uses" => "Auth\LoginController@logout"]);

//Cambiar Clave
/*Boton cambio de clave*/
route::get("auth/forgotPassword", ["as" => "cambiarClave", "uses" => "Auth\ForgotPasswordController@showLinkRequestForm"]);

/*Envio de email a mailtrap mediante formulario */
route::post("auth/forgotPassword", ["as" => "cambiarClave", "uses" => "Auth\ForgotPasswordController@sendResetLinkEmail"]);

/* Reestablecer Contraseña */
route::get("password/reset/{token}", ["as" => "password.reset", "uses" => "Auth\ResetPasswordController@showResetForm"]); 
route::post("password/reset", ["uses" => "Auth\ResetPasswordController@reset"]); 

/* ROUTES de mensajes recibidos desde la sección "mensaje" con Query Builder DB*/
//Create es Index HTML
route::get("mensajes/create", ["as" => "mensajes.create", "uses" => "mensajeController@create"]);
//Store es guardar y redireccionar (Utilizado en el formulario de mensajes.create)
route::post("mensajes", ["as" => "mensajes.store", "uses" => "mensajeController@store"]);
//Show - Mostrar un mensaje especifico
route::get("mensajes/create/{id}", ["as" => "mensajes.show", "uses" => "mensajeController@show"]);
//Edit - Editar mensaje especifico
route::get("mensajes/create/{id}/edit", ["as" => "mensajes.edit", "uses" => "mensajeController@edit"]);
//PUT (Update) - Actualizar mensaje editado
route::put("mensajes/create/{id}", ["as" => "mensajes.update", "uses" => "mensajeController@update"]);
//Delete - Borra algun mensaje seleccionado
route::delete("mensajes/create/{id}", ["as" => "mensajes.destroy", "uses" => "mensajeController@destroy"]);
