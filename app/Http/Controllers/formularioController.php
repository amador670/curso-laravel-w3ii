<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Http\Requests\mensajeValidacionFormulario;

class formularioController extends Controller
{
    public function formularioUsuario(Request $request)
    {
        //Metodo input()
        $usuario = $request->input("usuario");

        //Propiedades de instancia de solicitud
        $password = $request->password;

        return view("temas/solicitud_metodo_path", compact("usuario", "password"));
    }

    public function formulario_html_en_laravel_recibido(mensajeValidacionFormulario $request, Response $response)
    {

        $nombre = $request->input("nombre");
        $comentario = $request->input("comentario");
        $selectOption = $request->selectOption;

        if (!empty($_FILES['imagen']['name'])) {

            $file = $request->file("imagen");
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $fileRealPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $fileMimeType = $file->getMimeType();
            $destinationPath = 'formulario_archivos_subidos/';
            $fileMove = $file->move($destinationPath, $file->getClientOriginalName());

            $response = new response(view("formularios/formulario_recibido", compact("nombre", "comentario", "selectOption", "file", "fileName", "fileExtension", "fileRealPath", "fileSize", "fileMimeType", "fileMove")));

            $response->withCookie(cookie()->forever("cookieImagen", $request->root() . "/" . $fileMove));

            //Crear cookie de imagen
            return $response;

        } else {

            $response = new response(view("formularios/formulario_recibido", compact("nombre", "comentario", "selectOption")));

            //Crear cookie de imagen
            return $response;
        }
    }
}
