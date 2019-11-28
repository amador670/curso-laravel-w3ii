<?php

namespace App\Http\Controllers;

use App\registerUserModel;
use Illuminate\Http\Request;
use \App\Http\Requests\userValidationForm;

class UserController extends Controller
{

    //De esta forma llamamos al middleware "auth" que se encuentra dentro del kernel, este nos permite verificar si hay un usuario logeado y permitir ejecutar las url del controller
    public function __construct()
    {
        //Para pasar parametros a los middleware añadimos : y luego el parametro
        $this->middleware("auth");

        $this->middleware(
            "role:admin,moderador",
            ["except" => ["edit", "update"]]
        );

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\User::all();
        return view("usuarios.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //Editamos
        $user = registerUserModel::findOrFail($id);

        //Verificamos el usuario mediante la userPolicy
        $this->authorize($user);

        //Redireccionamos
        return view("usuarios.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userValidationForm $request, $id)
    {
        //Actualizar
        $user = registerUserModel::findOrFail($id);

        //Verificamos el usuario mediante la userPolicy
        $this->authorize($user);

        //Actualizamos 
        $user->update($request->all());

        //Redireccionar
        return back()->with("info", "Usuario Actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = registerUserModel::findOrFail($id);
        $user->delete();

        return back();
    }
}
