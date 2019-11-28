<?php
namespace App\Http\Controllers;

use App\mensajeEnloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use \App\Http\Requests\mensajeValidacionFormulario;

class mensajeController extends Controller
{
    //De esta forma llamamos al middleware "auth" que se encuentra dentro del kernel, este nos permite verificar si hay un usuario (user)
    public function __construct()
    {
        //Esto evita entrar a la url login sin estar autenticado
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Redireccionar y mostrar todos los mensajes
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Index principal de la sección "mensajes"
    public function create()
    {

        //Permitir que se guarde en el cache cada pestaña de la paginacion (page 1, 2, 3, etc)
        //Definimos una variable, con la url + request (resultado) de la paginacion (page)
        $key = "mensajes/create" . request('page', 1);

        if (Cache::tags("mensajes")->has($key)) {
            $mensajes = Cache::tags("mensajes")->get($key);

        } else {
            $mensajes = mensajeEnloquent::orderBy('id', 'desc')->paginate(5);

            Cache::tags("mensajes")->forever($key, $mensajes);
        }

        $items = [
            'No indico valor' => "¿Te gusta nuestro sitio web?",
            'Buen sitio web' => "Buen sitio web",
            'Debe mejorar' => "Debe mejorar",
            'Mal sitio web' => "Mal sitio web",
        ];

        return view("mensajes.create", compact("mensajes", "items"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Store es guardar y redireccionar
    public function store(mensajeValidacionFormulario $request)
    {
        //Guardar Mensaje
        $mensajes = mensajeEnloquent::create([
            "name" => auth()->user()->name,
            "email" => auth()->user()->email,
            "comment" => $request->input("comentario"),
            "valoration_for_website" => $request->input("selectOption"),
            "id_user_message" => auth()->id(),
        ]);

        //Subir imagen a servidor
        if ($request->hasFile("avatar")) {

            //retornar archivo, dar nombre y asignar
            $file = $request->file("avatar");
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(111, 99999) . '.' . $extension;

            $destinationPath = public_path('storage/');
            $image_url = $destinationPath . $fileName;

            //Recortar - Crop image
            $file = Image::make($file)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            if($request->input('width') || $request->input('height') || $request->input('x1') || $request->input('y1')){
                $file->crop($request->input('width'), $request->input('height'), $request->input('x1'), $request->input('y1'));
            }

            $file->save($image_url);

            $mensajes->avatar = $fileName;       
            
            /* ------------- */
           /* //retornar nombre del file 
            $filenamewithextension = $request->file('avatar')->getClientOriginalName();

            //asignar extension del file pathinfo
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //retornar extension del file
            $extension = $request->file('avatar')->getClientOriginalExtension();

            //asignar nombre y extension del file
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Cargar file - Upload File            
            $request->file('avatar')->storeAs('public/profile_images', $filenametostore);

            //Comprobar si existe esa carpeta, o crearla
            if (!file_exists(public_path('storage/profile_images/crop'))) {
                mkdir(public_path('storage/profile_images/crop'), 0755);
            }

            //Recortar imagen - crop image
            //Crear imagen con intervention.io
            $img = Image::make(public_path('storage/profile_images/' . $filenametostore));
            $croppath = public_path('storage/profile_images/crop/' . $filenametostore);

            //Asignar medidas 
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            //Recortar imagen            
            $img->crop($request->input('width'), $request->input('height'), $request->input('x1'), $request->input('y1'));

            //Guardar imagen y setearla
            $img->save($croppath);
            $path = asset('storage/profile_images/crop/' . $filenametostore);*/
        }

        $mensajes->save();

        //Permite borrar todo el cache, para luego guardarlo con todos los datos nuevos ingresados por el usuario ("nuevos mensajes")
        Cache::tags("mensajes")->flush();

        //Redireccionar mensaje
        return redirect()->route("mensajes.create")->with(['success' => "Comentario enviado correctamente"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Show es para mostrar un mensaje especifico de la base de datos
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Edit es para editar mensajes especificos
    public function edit($id)
    {
        $mensaje = mensajeEnloquent::findOrFail($id);

        $items = [
            'No indico valor' => "¿Te gusta nuestro sitio web?",
            'Buen sitio web' => "Buen sitio web",
            'Debe mejorar' => "Debe mejorar",
            'Mal sitio web' => "Mal sitio web",
        ];

        if (auth()->user()->role == "admin" || Gate::allows('mensajePolicy', $mensaje)) {
            return view("mensajes.edit", compact("mensaje", "items"));
        } else {
            return abort(404);
        }

        exit;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Update es para actualizar el mensaje y redireccionar
    public function update(mensajeValidacionFormulario $request, $id)
    {
        //Actualizar
        $mensaje = mensajeEnloquent::findOrFail($id);

        if (auth()->user()->role == "admin" || Gate::allows('mensajePolicy', $mensaje)) {

            $mensaje->update([
                "comment" => $request->input("comentario"),
                "valoration_for_website" => $request->input("selectOption"),
                $mensaje->touch(),
            ]);

            //Permite borrar todo el cache, para luego guardarlo con todos los datos nuevos ingresados por el usuario ("nuevos mensajes")
            Cache::tags("mensajes")->flush();

            //Redireccionar
            return redirect()->route("mensajes.create");

        } else {
            return abort(404);
        }

        exit;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Destroy es para borrar el mensaje
    public function destroy($id)
    {
        //Eliminar mensaje
        $mensaje = mensajeEnloquent::findOrFail($id);
        $mensaje->delete();

        //Borrar todo el cache para reiniciar los datos que se mostraran
        Cache::tags("mensajes")->flush();

        //Redireccionar
        return redirect()->route("mensajes.create");
    }
}
