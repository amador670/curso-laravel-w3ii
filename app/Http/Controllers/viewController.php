<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mail;

class viewController extends Controller
{
    //funciones principales del menu
    public function inicio()
    {
        return view("index");
    }

    public function instalacion_laravel()
    {
        return view("temas/instalacion_laravel");
    }

    public function estructura_de_la_aplicacion()
    {
        return view("temas/estructura_de_la_aplicacion");
    }

    public function configurar_laravel()
    {
        return view("temas/configurar_laravel");
    }

    public function añadir_bootstrap_laravel()
    {
        return view("temas/añadir_bootstrap_laravel");
    }

    public function enrutamiento()
    {
        return view("temas/enrutamiento");
    }

    public function middlewareLaravel()
    {
        return view("temas/middleware");
    }

    public function controladores()
    {
        $example = 'La variable $example es creada desde un controlador.';
        return view("temas/controllers", compact("example"));
    }

    public function solicitud_metodo_path()
    {
        return view("temas/solicitud_metodo_path");
    }

    public function cookie(Request $request, Response $response)
    {
        //Duracion de la cookie
        $minutosCookie = 1;

        //Valor de la cookie 2
        $valorBackground = "background:#d1fff2; padding:5px;";

        //Definimos la cookie. En el metodo $response añadimos la pagina que queremos mostrar.
        $response = new response(view("temas/cookie"));

        //Creamos la cookie("nombre", "valor", "duracion")
        $response->withCookie(cookie("cookieLaravel", "Texto añadido mediante una cookie", $minutosCookie));
        $response->withCookie(cookie("cookieBackground", $valorBackground, $minutosCookie));

        //Retornamos el metodo response
        return $response;
    }

    public function rutas_view()
    {
        return view("temas/rutas_view");
    }

    public function redirecciones()
    {
        return view("temas/redirecciones");
    }

    public function base_de_datos()
    {
        return view("temas/base_de_datos");
    }

    public function control_base_de_datos()
    {
        return view("temas/control_base_de_datos");
    }

    public function constructor_de_consultas_query()
    {
        return view("temas/constructor_de_consultas_query");
    }

    public function propiedades_sql()
    {
        return view("temas/propiedades_sql");
    }

    public function orm_enloquent()
    {
        return view("temas/orm_enloquent");
    }

    public function autenticacion_de_usuario()
    {
        return view("temas/autenticacion_de_usuario");
    }

    public function roles_en_laravel()
    {
        return view("temas/roles_en_laravel");
    }

    public function encriptar_clave()
    {
        return view("temas/encriptar_clave");
    }

    public function autorizaciones_policies()
    {
        return view("temas/autorizaciones_policies");
    }

    public function errores_en_laravel()
    {
        return view("temas/errores_en_laravel");
    }

    public function paginacion_laravel(){
        return view("temas/paginacion_laravel");
    }

    public function cache_laravel(){
        return view("temas/cache_laravel");
    }

    public function repositorios_y_docoradores(){
        return view("temas/repositorios_y_docoradores");
    }

    public function formularios_html_en_laravel()
    {
        return view("temas/formularios_html_en_laravel");
    }

    public function localizacion_language()
    {
        return view("temas/localizacion_language");
    }

    public function sesiones_en_laravel()
    {
        return view("temas/sesiones_en_laravel");
    }

    public function propiedades_de_validacion()
    {
        return view("temas/propiedades_de_validacion");
    }

    public function subir_archivos_file()
    {
        return view("temas/subir_archivos_file");
    }

    public function subir_imagen_intervention(){
        return view("temas/subir_imagen_intervention");
    }

    public function envio_de_correo_laravel()
    {
        Mail::send('mail.mail', ["Mensaje enviado de forma exitosa"], function ($mensaje) {
            $mensaje->to('amadorjosemartinezrivera600@gmail.com')->subject('Mensaje enviado por Laravel Mail');
            $mensaje->from('amadorjosemartinezrivera600@gmail.com', 'Amador J. Martinez R.');
        }); 

        return view("temas/envio_de_correo_laravel");
    }

    public function eventos_listeners_laravel(){
        return view("temas/eventos_listeners_laravel");
    }

    public function excepciones_http()
    {
        return view("temas/excepciones_http");
    }

    public function laravel_collections()
    {
        $arrayFamilia = ["amador", "maximo", "magdalena", "karen", "sarah"];

        //1era forma de crear una coleccion
        //$arrayFamilia = new collection($arrayFamilia);

        //2da forma de crear una coleccion
        //$arrayFamilia = collection::make($arrayFamilia);

        //3era forma de crear una coleccion
        $arrayFamilia = collect($arrayFamilia);

        return view("temas/laravel_collections", compact("arrayFamilia"));
    }

    public function subir_laravel_a_hosting()
    {
        return view("temas/subir_laravel_a_hosting");
    }

    public function recibir_datos_request()
    {
        return view("temas/recibir_datos_request");
    }

}
