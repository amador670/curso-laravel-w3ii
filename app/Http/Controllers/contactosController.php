<?php

namespace App\Http\Controllers;

use App\contactoModelEnloquent;
use Illuminate\Http\Request;
use \App\Http\Requests\mensajeValidacionFormulario;

class contactosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("contactos.create");
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
        //Guardar datos
        contactoModelEnloquent::create([
                "nombre" => $request->input("nombre"),
                "clave" => $request->input("clave"),
                "comentario" => $request->input("comentario"),
                "opinion_del_sitio_web" => $request->input("selectOption"),
            ]);

        //Redireccionar mensaje
        $contactos = contactoModelEnloquent::all();
        $contactos = $contactos->reverse();

        return view('contactos.create', compact("contactos"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
