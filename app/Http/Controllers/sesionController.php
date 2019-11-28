<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sesionController extends Controller
{
  public function index(Request $request){
    //Seleccionamos el valor de nuestro input
    $usuarioInput = ucwords($request->input("usuario")); 

    //Creamos la sesion ->put("nombre de la sesion", "valor de la sesion");
    $request->session()->put("nombre", $usuarioInput);
    
    //Retornamos el valor de la sesion
    $nombreSesion = $request->session()->get("nombre");

    //Mostramos pantalla
    return view("sesiones/sesion_login", compact("nombreSesion"));
  }  
}
