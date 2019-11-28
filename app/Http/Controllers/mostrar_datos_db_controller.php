<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;


class mostrar_datos_db_controller extends Controller
{
    public function mostrarDatos(Request $request){

        $nombre = $request->input("nombre");
        $clave = $request->input("clave");
        $comentario = $request->input("comentario");
    
        return view("base_datos/mostrar_datos_db", compact("nombre", "clave", "comentario"));
   
    }
}
